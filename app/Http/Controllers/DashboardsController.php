<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Sale;
use App\Payment;
use Carbon\Carbon;

class DashboardsController extends Controller
{
    public function getDashboard(){
        $customers = Customer::all();
        /*foreach($customers as $customer) {
            $records = DB::table('record')->where('customer_id', $customer->id)->get();
        }*/

        $week =  new Carbon;
        $week->subDays(7);
        $month = new Carbon;
        $month->startOfMonth();
        $year = new Carbon;
        $year->startOfYear();
        $sales = Sale::all();
        $records_week = DB::table('record')->where('date', '>', $week->ToDateTimeString())->get();
        $records_month = DB::table('record')->where('date', '>', $month->ToDateTimeString())->get();
        if (count($sales) > 0){

            $sale_week = Sale::where('date', '>', $week->toDateTimeString() )->get();
            $sale_month = Sale::where('date', '>', $month->toDateTimeString() )->get();
            $sale_year = Sale::where('date', '>', $year->toDateTimeString() )->get();
        }
        else{
            $sale_week = NULL;
            $sale_month = NULL;
            $sale_year = NULL;
        }
        $payments = Payment::all();
        if (count($sales) > 0){
            $payment_week = Payment::where('date', '>', $week->toDateTimeString() )->get();
            $payment_month = Payment::where('date', '>', $month->toDateTimeString() )->get();
            $payment_year = Payment::where('date', '>', $year->toDateTimeString() )->get();
        }
        else{
            $payment_week = NULL;
            $payment_month = NULL;
            $payment_year = NULL;
        }
        return view('dashboard', [
            'customers' => $customers,
            'sales' => $sales,
            'payments' => $payments,
            'sale_week' => $sale_week,
            'sale_month' => $sale_month,
            'sale_year' => $sale_year,
            'payment_week' => $payment_week,
            'payment_month' => $payment_month,
            'payment_year' => $payment_year,
            'records_week' => $records_week,
            'records_month' => $records_month]);
    }
}
