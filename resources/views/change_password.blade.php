@extends('layouts.master')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Change Password</a> </div>
            @if(count($errors) > 0)
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Try Again!</h4>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Try Again!</h4>
                    {{ Session::get('error') }}</div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Success!</h4>
                    {{ Session::get('success') }}</div>
            @endif
            <h1>Change Password</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                            <h5>Change Password</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form id="form-wizard" class="form-horizontal" method="post" action="{{ route('update.password') }}">
                                {{ csrf_field() }}
                                <div id="form-wizard-1" class="step">
                                    <div class="control-group">
                                        <label class="control-label">Previous Password</label>
                                        <div class="controls">
                                            <input id="old_password" type="password" name="old_password" class="span5"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">New Password</label>
                                        <div class="controls">
                                            <input id="password" type="password" name="password" class="span5"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Confirm Password</label>
                                        <div class="controls">
                                            <input id="password2" type="password" name="confirm_password" class="span5"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Change</button>
                                    <div id="status"></div>
                                </div>
                                <div id="submitted"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.wizard.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.wizard.js"></script>
@endsection