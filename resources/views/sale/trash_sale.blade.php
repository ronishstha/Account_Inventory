@extends('layouts.master')

@section('style')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/extra.css') }}" />
@endsection

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('sale') }}" class="tip-bottom">Sales</a> <a href="#" class="current">Trash Sale</a> </div>
            @if(Session::has('success'))
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Success!</h4>
                    {{ Session::get('success') }}</div>
            @endif
            <h1>Trash Sale</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5 class="span9">Trash Sale</h5>
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
                               {{-- <h5>--}}

                                <button type="button"style="color:#666666; height:36px; ">
                                    <a href="{{ route('sale.restore.all') }}">
                                        <i class="material-icons" style="font-size:20px;">restore_page</i>
                                        Restore all
                                    </a>
                                </button>

                                <button type="button" data-toggle="modal" data-target="#allDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" style="color:#666666; height:36px; margin-left:-5px;">
                                    <a href="{{ route('sale.delete.all') }}">
                                        <i class="material-icons" style="font-size:20px;">delete</i>
                                    </a>
                                    Delete all
                                </button>
                                {{--</h5>--}}
                            @endif
                        </div>
                        <div class="widget-content nopadding">
                            @php
                                $count = 0;
                                $i = 0;
                            @endphp
                            @foreach($sales as $sale)
                                @php
                                    if($sale->status == "trash"){
                                        $i += 1;
                                }
                                @endphp
                            @endforeach
                            @if($i == 0)
                                <br><p align="center">Nothing in trash</p>
                            @else
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Remark</th>
                                        <th>Deleted By</th>
                                        <th>Restore</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        @if($sale->status == "trash")
                                            <tr class="gradeX">
                                                <td style="text-align:center">{{ $sale->customer->name }}</td>
                                                <td style="text-align:center">{{ $sale->date}}</td>
                                                <td style="text-align:center">{{ $sale->amount }}</td>
                                                <td style="text-align:center">{{ $sale->remark }}</td>
                                                <td style="text-align:center">{{ $sale->user->name }}</td>
                                                <td  style="text-align:center"><a href="{{ route('sale.restore', ['sale_id' => $sale->id]) }}"><i class="icon icon-share-alt"></i></a></td>
                                                <td style="text-align:center"><a href="{{ route('sale.single.sale', ['sale_id' => $sale->id]) }}"><i class="icon icon-folder-open-alt"></i></a></td>
                                                <td style="text-align:center">
                                                    <button class="btn-delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" style="color:#666666">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Delete Permanently</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure about this ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-danger" id="confirm"><a href="{{ route('sale.delete', ['sale_id' => $sale->id]) }}" style="color:white">Delete</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="allDelete" role="dialog" aria-labelledby="allDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Delete Permanently</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete all?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-danger" id="allconfirm"><a href="{{ route('sale.delete.all') }}" style="color:white">Delete</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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