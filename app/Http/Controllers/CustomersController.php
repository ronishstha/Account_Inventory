<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Sale;
use App\Payment;
use Carbon\Carbon;

class CustomersController extends Controller
{
    public function getCustomer(){
        $customers = Customer::orderBy('created_at', 'desc')->get();
        return view('customer.customer', ['customers' => $customers]);
    }

    public function getCreateCustomer(){
        return view('customer.create_customer');
    }

    public function postCreateCustomer(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $customer = new Customer();
        $customer->name= $request['name'];
        $customer->pan_no = $request['pan_no'];
        $customer->address = $request['address'];
        $customer->phone = $request['phone'];
        $customer->contact = $request['contact'];
        $customer->status = $request['status'];
        $user = Auth::user();
        $user->customers()->save($customer);

        return redirect()->route('customer')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($customer_id){
        $customer = Customer::findorFail($customer_id);
        return view('customer.update_customer', ['customer' => $customer]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $customer = Customer::findOrFail($request['customer_id']);
        $customer->name= $request['name'];
        $customer->pan_no = $request['pan_no'];
        $customer->address = $request['address'];
        $customer->phone = $request['phone'];
        $customer->contact = $request['contact'];
        $customer->status = $request['status'];
        $user = Auth::user();
        $customer->user_id = $user->id;
        $customer->update();
        return redirect()->route('customer')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($customer_id){
        $customer = Customer::findOrFail($customer_id);
        $customer->delete();
        return redirect()->route('customer.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($customer_id){
        $customer = Customer::findOrFail($customer_id);
        $customer->status = "trash";
        $customer->update();
        return redirect()->route('customer')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleCustomer($customer_id){
        $records = DB::table('record')->where('customer_id', $customer_id)->get();

        $customer = Customer::where('id', $customer_id)->first();
        $payment = Payment::where('customer_id', $customer_id)->orderBy('date', 'desc')->first();
        if(!empty($payment)) {
            $payment_date = Carbon::parse($payment->date);
            $current_date = Carbon::now();
            $payment_difference = $current_date->diffInDays($payment_date);
        }
        else{
            $payment_date = Carbon::now();
            $payment_difference = NULL;
            $payment = NULL;
        }
        $sale = Sale::where('customer_id', $customer_id)->orderBy('date', 'desc')->first();
        if(!empty($sale)) {
            $sale_date = Carbon::parse($sale->date);
            $sale_difference = $sale_date->diffInDays($payment_date);
        }
        if(count($sale) == 0){
            $sale = NULL;
            $sale_difference = NULL;
        }

        return view('customer.single_customer', ['customer' => $customer, 'sale' => $sale, 'payment' => $payment, 'records' => $records, 'payment_difference' => $payment_difference, 'sale_difference' => $sale_difference]);

    }

    public function DeleteForever(){
        $customers = Customer::all();
        return view('customer.trash_customer', ['customers' => $customers ]);
    }

    public function Restore($customer_id){
        $customer = Customer::findorFail($customer_id);
        $customer->status = "published";
        $customer->update();
        return redirect()->route('customer')->with(['success' => 'Successfully restored']);
    }

    public function DeleteAll(){
        $customers = Customer::where('status', 'trash')->get();
        foreach($customers as $customer){
            if($customer->status = "trash"){
                $customer->delete();
            }
        }
        return redirect()->route('customer.delete.page')->with(['success' => 'Trash Cleared - All items deleted']);
    }

    public function RestoreAll(){
        $customers = Customer::all();
        foreach($customers as $customer){
            if($customer->status = "trash"){
                $customer->status = "published";
                $customer->update();
            }
        }
        return redirect()->route('customer')->with(['success' => 'All items restored']);
    }
}
