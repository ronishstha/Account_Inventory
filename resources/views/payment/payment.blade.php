@extends('layouts.master')

@section('style')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/extra.css') }}" />
@endsection

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Payments</a> </div>
            @if(count($errors) > 0)
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Try Again!</h4>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Success!</h4>
                    {{ Session::get('success') }}</div>
            @endif
            <h1>Payments</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5 class="span11">Payments</h5>
                            <div class="del" style="padding-top:5px;">
                            <a href="{{ route('payment.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($payments);
                                        $i = 0;
                                    @endphp
                                    @foreach($payments as $payment)
                                        @php

                                            if($payment->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if($i != 0)
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            </div>
                        </div>
                        <div class="widget-content nopadding">
                            @if(count($payments) == 0 || $count == $i)
                                <br><p align="center">No payment available<p>
                            @else
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        @if($payment->status == "published" || $payment->status == "unpublished")
                                            <tr class="gradeX">
                                                <td style="text-align:center">{{ $payment->customer->name }}</td>
                                                <td style="text-align:center">{{ $payment->date }}</td>
                                                <td style="text-align:center">{{ $payment->amount }}</td>
                                                <td style="text-align:center">{{ $payment->payment_mode }}</td>
                                                <td style="text-align:center"><a href="{{ route('payment.get.update', ['payment_id' => $payment->id]) }}"><i class="icon icon-pencil"></i></a></td>
                                                <td style="text-align:center"><a href="{{ route('payment.single.payment', ['payment_id' => $payment->id]) }}"><i class="icon icon-folder-open-alt"></i></a></td>
                                                <td style="text-align:center"><a href="{{ route('payment.trash', ['payment_id' => $payment->id]) }}"><i class="icon icon-remove"></i></a></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection