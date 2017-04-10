<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Sale;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function getSale(){
        $sales = Sale::orderBy('created_at', 'desc')->get();
        return view('sale.sale', ['sales' => $sales]);
    }

    public function getCreateSale(){
        $customers = Customer::all();
        return view('sale.create_sale', compact('customers'));
    }

    public function postCreateSale(Request $request){
        $this->validate($request, [
            'amount' => 'required',
            'customer' => 'required',
            'date' => 'required'
        ]);

        $sale = new Sale();
        $client = $request['customer'];
        $sale->amount = $request['amount'];
        $sale->status = $request['status'];
        $date = Carbon::parse($request['date']);
        $sale->date = $date->toDateString();
        $sale->remark = $request['remark'];
        $user = Auth::user();
        $customer = Customer::where('name', $client)->first();
        $sale->user()->associate($user);
        $sale->customer()->associate($customer);
        $sale->save();

        return redirect()->route('sale')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($sale_id){
        $customers = Customer::all();
        $sale = Sale::findorFail($sale_id);
        return view('sale.update_sale', ['sale' => $sale], ['customers' => $customers]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'customer' => 'required',
            'date' => 'required'
        ]);
        $sale = Sale::findOrFail($request['sale_id']);
        $client = $request['customer'];
        $sale->amount= $request['amount'];
        $sale->status = $request['status'];
        $date = Carbon::parse($request['date']);
        $sale->date = $date->toDateString();
        $sale->remark = $request['remark'];
        $user = Auth::user();
        $customer = Customer::where('name', $client)->first();
        $sale->user_id = $user->id;
        $sale->customer_id = $customer->id;
        $sale->update();
        return redirect()->route('sale')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($sale_id){
        $sale = Sale::findOrFail($sale_id);
        $sale->delete();
        return redirect()->route('sale.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($sale_id){
        $sale = Sale::findOrFail($sale_id);
        $sale->status = "trash";
        $sale->update();
        return redirect()->route('sale')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleSale($sale_id){
        $sale = Sale::where('id', $sale_id)
            ->first();
        return view('sale.single_sale', ['sale' => $sale]);

    }

    public function DeleteForever(){
        $sales = Sale::all();
        return view('sale.trash_sale', ['sales' => $sales ]);
    }

    public function Restore($sale_id){
        $sale = Sale::findorFail($sale_id);
        $sale->status = "published";
        $sale->update();
        return redirect()->route('sale')->with(['success' => 'Successfully restored']);
    }

    public function DeleteAll(){
        $sales = Sale::where('status', 'trash')->get();
        foreach($sales as $sale){
            if($sale->status = "trash"){
                $sale->delete();
            }
        }
        return redirect()->route('sale.delete.page')->with(['success' => 'Trash Cleared - All items deleted']);
    }

    public function RestoreAll(){
        $sales = Sale::all();
        foreach($sales as $sale){
            if($sale->status = "trash"){
                $sale->status = "published";
                $sale->update();
            }
        }
        return redirect()->route('sale')->with(['success' => 'All items restored']);
    }
}
