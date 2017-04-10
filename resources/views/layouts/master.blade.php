<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{  URL::asset('css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/matrix-media.css') }}" />
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.gritter.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    @yield('style')

</head>
<body>
@include('layouts.header')

@include('layouts.sidebar')

@yield('content')


<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.ui.custom.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.uniform.js') }}"></script>
<script src="{{ URL::asset('js/select2.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validate.js') }}"></script>
<script src="{{ URL::asset('js/matrix.js') }}"></script>
<script src="{{ URL::asset('js/matrix.form_validation.js') }}"></script>
{{--calendar--}}
<script src="{{URL::asset('js/fullcalendar.min.js')}}"></script>
<script src="{{URL::asset('js/matrix.calendar.js')}}"></script>
{{--endcalendar--}}
{{--table--}}
<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/matrix.tables.js') }}"></script>
{{--endtable--}}
{{--basicform--}}
<script src="{{ URL::asset('js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('js/jquery.toggle.buttons.js') }}"></script>
<script src="{{ URL::asset('js/masked.js') }}"></script>
<script src="{{ URL::asset('js/matrix.form_common.js') }}"></script>
<script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script>
{{--endbasicform--}}
{{--formwizard--}}
<script src="{{ URL::asset('js/jquery.validate.js') }}"></script>
<script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
<script src="{{ URL::asset('js/matrix.wizard.js') }}"></script>
{{--endformwizard--}}
{{--chat--}}
<script src="{{ URL::asset('js/matrix.chat.js') }}"></script>
{{--endchat--}}
@yield('js')

</body>
</html>