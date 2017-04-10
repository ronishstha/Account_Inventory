@extends('layouts.master')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('customer') }}" class="tip-bottom">Customers</a> <a href="#" class="current">Create Customer</a> </div>
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
            <h1>Create Customer</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Create Customer</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('customer.post.create') }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" class="span10" placeholder="Enter Name" value="{{ Request::old('name') }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Pan Number</label>
                                    <div class="controls">
                                        <input type="text" name="pan_no" id="pan_no" class="span10" placeholder="Enter Pan Number" value="{{ Request::old('pan_no') }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <input type="text"  name="address" id="address" class="span10" placeholder="Enter Address"  value="{{ Request::old('address') }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Phone</label>
                                    <div class="controls">
                                        <input type="text" name="phone" id="phone" class="span10" placeholder="Enter Phone Number" value="{{ Request::old('phone') }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Contact</label>
                                    <div class="controls">
                                        <input type="text" name="contact" id="contact" class="span10" placeholder="Enter Contact" value="{{ Request::old('contact') }}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Status</label>
                                    <div class="controls">
                                        <select name="status" id="status" class="span5">
                                            <option>published</option>
                                            <option>unpublished</option>
                                            <option>trash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection