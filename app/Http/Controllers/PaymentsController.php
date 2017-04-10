<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Payment;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function getPayment(){
        $payments = Payment::orderBy('created_at', 'desc')->get();
        return view('payment.payment', ['payments' => $payments]);
    }

    public function getCreatePayment(){
        $customers = Customer::all();
        return view('payment.create_payment', compact('customers'));
    }

    public function postCreatePayment(Request $request){
        $this->validate($request, [
            'amount' => 'required',
            'customer' => 'required',
            'date' => 'required',
            'payment_mode' => 'required'
        ]);

        $payment = new Payment();
        $client = $request['customer'];
        $payment->amount = $request['amount'];
        $payment->status = $request['status'];
        $date = Carbon::parse($request['date']);
        $payment->date = $date->toDateString();
        $payment->payment_mode = $request['payment_mode'];
        $payment->cheque_details = $request['cheque_details'];
        $user = Auth::user();
        $customer = Customer::where('name', $client)->first();
        $payment->user()->associate($user);
        $payment->customer()->associate($customer);
        $payment->save();

        return redirect()->route('payment')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($payment_id){
        $customers = Customer::all();
        $payment = Payment::findorFail($payment_id);
        return view('payment.update_payment', ['payment' => $payment], ['customers' => $customers]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'customer' => 'required',
            'date' => 'required',
            'payment_mode' => 'required'
        ]);
        $payment = Payment::findOrFail($request['payment_id']);
        $client = $request['customer'];
        $payment->amount= $request['amount'];
        $payment->status = $request['status'];
        $date = Carbon::parse($request['date']);
        $payment->date = $date->toDateString();
        $payment->payment_mode = $request['payment_mode'];
        $payment->cheque_details = $request['cheque_details'];
        $user = Auth::user();
        $customer = Customer::where('name', $client)->first();
        $payment->user_id = $user->id;
        $payment->customer_id = $customer->id;
        $payment->update();
        return redirect()->route('payment')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($payment_id){
        $payment = Payment::findOrFail($payment_id);
        $payment->delete();
        return redirect()->route('payment.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($payment_id){
        $payment = Payment::findOrFail($payment_id);
        $payment->status = "trash";
        $payment->update();
        return redirect()->route('payment')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSinglePayment($payment_id){
        $payment = Payment::where('id', $payment_id)
            ->first();
        return view('payment.single_payment', ['payment' => $payment]);

    }

    public function DeleteForever(){
        $payments = Payment::all();
        return view('payment.trash_payment', ['payments' => $payments ]);
    }

    public function Restore($payment_id){
        $payment = Payment::findorFail($payment_id);
        $payment->status = "published";
        $payment->update();
        return redirect()->route('payment')->with(['success' => 'Successfully restored']);
    }

    public function DeleteAll(){
        $payments = Payment::where('status', 'trash')->get();
        foreach($payments as $payment){
            if($payment->status = "trash"){
                $payment->delete();
            }
        }
        return redirect()->route('payment.delete.page')->with(['success' => 'Trash Cleared - All items deleted']);
    }

    public function RestoreAll(){
        $payments = Payment::all();
        foreach($payments as $payment){
            if($payment->status = "trash"){
                $payment->status = "published";
                $payment->update();
            }
        }
        return redirect()->route('payment')->with(['success' => 'All items restored']);
    }
}
