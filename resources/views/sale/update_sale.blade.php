@extends('layouts.master')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('sale') }}" class="tip-bottom">Sales</a> <a href="#" class="current">Edit Sale</a> </div>
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
            <h1>Edit Sale</h1>
        </div>

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit Sale</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('sale.post.update') }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Amount</label>
                                    <div class="controls">
                                        <input type="text" name="amount" id="amount" class="span10" placeholder="Enter Amount" value="{{ Request::old('amount') ? Request::old('amount') : isset($sale) ? $sale->amount : '' }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Remark</label>
                                    <div class="controls">
                                        <input type="text" name="remark" id="remark" class="span10" placeholder="Enter Remark" value="{{ Request::old('remark') ? Request::old('remark') : isset($sale) ? $sale->remark : '' }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Customer</label>
                                    <div class="controls">
                                        <select name="customer" id="customer" class="span5">
                                            @foreach($customers as $customer)
                                                <option @if($sale->customer->name == "$customer->name") selected @endif>{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Date</label>
                                    <div class="controls">
                                        <div  data-date="04-08-2017" class="input-append date datepicker span7">
                                            <input type="text" name="date" id="date" data-date-format="mm-dd-yyyy" class="span8" value="{{ Request::old('date') ? Request::old('date') : isset($sale) ? $sale->date : '' }}">
                                            <span class="add-on"><i class="icon-th"></i></span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Status</label>
                                    <div class="controls">
                                        <select name="status" id="status" class="span5">
                                            <option @if($sale->status =="published") selected @endif>published</option>
                                            <option @if($sale->status =="unpublished") selected @endif>unpublished</option>
                                            <option @if($sale->status =="trash") selected @endif>trash</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="sale_id" value="{{ $sale->id }}">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection