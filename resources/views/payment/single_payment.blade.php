@extends('layouts.master')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('payment') }}" class="tip-bottom">Customers</a> <a href="#" class="current">View Payment</a> </div>
            <h1>Tables</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">

            </div>
        </div>
    </div>
@endsection