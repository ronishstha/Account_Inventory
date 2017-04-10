<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/matrix-login.css') }}" />
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


</head>
<body>
@if(count($errors) > 0)
    <div class="alert alert-error alert-block" style="margin-top:-150px"> <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Try Again!</h4>
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
<div id="loginbox">
    <form id="loginform" method="post" class="form-vertical" action="{{ route('admin.login.post') }}">
        {{csrf_field()}}
        <div class="control-group normal_text"> <h3 style="color:white">Admin Login{{--<img src="img/logo.png" alt="Logo" />--}}</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="email" id="email" placeholder="Email" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" id="password" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            {{--<span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>--}}
            <span class="pull-right"><button type="submit" class="btn btn-success"> Login</button></span>
        </div>
    </form>
    {{--<form id="recoverform" action="#" class="form-vertical">--}}
        {{--<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>--}}

        {{--<div class="controls">--}}
            {{--<div class="main_input_box">--}}
                {{--<span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-actions">--}}
            {{--<span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>--}}
            {{--<span class="pull-right"><a class="btn btn-info"/>Recover</a></span>--}}
        {{--</div>--}}
    {{--</form>--}}
</div>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/matrix.login.js') }}"></script>
</body>

</html>
