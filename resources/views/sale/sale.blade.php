@extends('layouts.master')

@section('style')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/extra.css') }}" />
@endsection

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Sales</a> </div>
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
            <h1>Sales</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5 class="span11">Sales</h5>
                            <div class="del" style="padding-top:5px;">
                            <a href="{{ route('sale.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($sales);
                                        $i = 0;
                                    @endphp
                                    @foreach($sales as $sale)
                                        @php

                                            if($sale->status == "trash"){
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
                            @if(count($sales) == 0 || $count == $i)
                                <br><p align="center">No sale available<p>
                            @else
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Remark</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        @if($sale->status == "published" || $sale->status == "unpublished")
                                            <tr class="gradeX">
                                                <td style="text-align:center">{{ $sale->customer->name }}</td>
                                                <td style="text-align:center">{{ $sale->date }}</td>
                                                <td style="text-align:center">{{ $sale->amount }}</td>
                                                <td style="text-align:center">{{ $sale->remark }}</td>
                                                <td style="text-align:center"><a href="{{ route('sale.get.update', ['sale_id' => $sale->id]) }}"><i class="icon icon-pencil"></i></a></td>
                                                <td style="text-align:center"><a href="{{ route('sale.single.sale', ['sale_id' => $sale->id]) }}"><i class="icon icon-folder-open-alt"></i></a></td>
                                                <td style="text-align:center"><a href="{{ route('sale.trash', ['sale_id' => $sale->id]) }}"><i class="icon icon-remove"></i></a></td>
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