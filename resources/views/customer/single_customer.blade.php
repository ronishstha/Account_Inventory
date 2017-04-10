@extends('layouts.master')

@section('content')
    @php
        $total = 0
    @endphp
    @foreach($records as $record)
        @php $total = $total + $record->credit - $record->debit  @endphp
    @endforeach
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('customer') }}" class="tip-bottom">Customers</a> <a href="#" class="current">View Customer</a> </div>
            @if($total >= 100000)
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Reminder!</h4>
                    Balance has exceeded over 100000
                </div>
            @endif
            @if(($payment_difference >= 90|| $sale_difference >= 90) && $total > 0)
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Reminder!</h4>
                    90 days have crossed since last payment
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
                            <h5 >{{ $customer->name }}</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span6">
                                    <table class="">
                                        <tbody>
                                        <tr>
                                            <td><h4>{{ $customer->name }}</h4></td>
                                        </tr>
                                        <tr>
                                            <td>{{ $customer->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $customer->phone }}</td>
                                        <tr>
                                            <td >{{ $customer->contact }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="span6">
                                    <table class="table table-bordered table-invoice">
                                        <tbody>
                                        <tr>
                                        <tr>
                                            <td class="width30">Pan No</td>
                                            <td class="width70"><strong>{{ $customer->pan_no }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Last Sale Date:</td>
                                            <td><strong>@if (!empty($sale)) {{ $sale->date }} @else No sales made yet @endif</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Last Payment Date:</td>
                                            <td><strong>@if (!empty($payment)) {{ $payment->date }} @else No payment made yet @endif</strong></td>
                                        </tr>
                                        <td class="width30">Balance:</td>
                                        <td class="width70"><strong>Rs. {{ $total }}</strong><br></td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div style="text-align:center">
                                <h4><span>@if(count($records) > 0) LEDGER @endif</span></h4>
                                <br>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    @if(count($records) == 0)
                                        <br><p align="center">No transactions have been made yet<p>
                                    @else
                                    <table class="table table-bordered table-invoice-full">
                                        <thead>
                                        <tr>
                                            <th class="head0">Date</th>
                                            <th class="head1">Type</th>
                                            <th class="head1">Payment Mode</th>
                                            <th class="head0">Debit</th>
                                            <th class="head1">Credit</th>
                                            <th class="head0">Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $balance = 0
                                        @endphp
                                        @foreach($records as $record)
                                        <tr>
                                            <td style="text-align:center">{{ $record->date }}</td>
                                            <td style="text-align:center">{{ $record->type }}</td>
                                            <td style="text-align:center">{{ $record->payment_mode }}</td>
                                            <td style="text-align:center">
                                                @if(!empty($record->debit))
                                                    Rs. {{ $record->debit }}
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if(!empty($record->credit))
                                                    Rs. {{ $record->credit }}
                                                @endif
                                            </td>
                                            <td style="text-align:center"><strong>Rs. {{ $balance = $balance + $record->credit - $record->debit }}</strong></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                        <h4><span>Amount Due:</span> Rs. {{ $balance }}</h4>
                                        <br>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection