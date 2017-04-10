@extends('layouts.master')

@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
            {{--@foreach($records as $record)--}}
                {{--{{ $records }}--}}
            {{--@endforeach--}}
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="quick-actions_homepage">
                <ul class="quick-actions span12">
                    <li class="bg_lb span3" style="height:100px;"> <a href="{{ route('customer') }}"> <i class="icon-group"></i><p>Total Customers</p><p style="margin-top:-5px">{{ count($customers) }}</p></a></li>
                    <li class="bg_lg span4" style="height:100px;"> <a href="{{ route('sale') }}"> <i class="icon-book"></i><p>Total Sales</p><p style="margin-top:-5px">{{ count($sales) }}</p></a></li>
                    <li class="bg_ly span3" style="height:100px;"> <a href="{{ route('payment') }}"><i class="icon-credit-card"></i><p>Total Payments</p><p style="margin-top:-5px">{{ count($payments) }}</p></a></li>
                    {{--<li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
                    <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>
                    <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
                    <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
                    <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
                    <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
                    <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>--}}

                </ul>
            </div>
            <!--End-Action boxes-->

            <hr/>
            <div class="row-fluid">
                <div class="span6">
                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><strong>Sales</strong>  <i class="icon icon-chevron-down"></i></span>
                                        <h5>This Week</h5>
                                    </a> </div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseG2One">
                                @php $total_sale_week = 0 @endphp
                                @foreach($sale_week as $sale)
                                    @php
                                        $total_sale_week += $sale->amount
                                    @endphp
                                @endforeach

                                <div class="widget-content">
                                    <table class="table table-bordered table-invoice-full">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center"><strong>Total Sales:</strong> {{ count($sale_week) }}</td>
                                                @if (count($sale_week) > 0) <td style="text-align:center"><strong>Total Amount:</strong> Rs. {{ $total_sale_week }} </td>@endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseG2Two" data-toggle="collapse"> <span class="icon"><strong>Sales</strong>  <i class="icon icon-chevron-down"></i></span>
                                        <h5>This Month</h5>
                                    </a> </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseG2Two">
                                @php $total_sale_month = 0 @endphp
                                @foreach($sale_month as $sale)
                                    @php
                                        $total_sale_month += $sale->amount
                                    @endphp
                                @endforeach
                                    <div class="widget-content">
                                        <table class="table table-bordered table-invoice-full">

                                            <tr>
                                                <td style="text-align:center"><strong>Total Sales:</strong> {{ count($sale_month) }}</td>
                                                @if (count($sale_month) > 0) <td style="text-align:center"><strong>Total Amount:</strong> Rs. {{ $total_sale_month }} </td>@endif
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseG2Three" data-toggle="collapse"> <span class="icon"><strong>Sales</strong>  <i class="icon icon-chevron-down"></i></span>
                                        <h5>This Year</h5>
                                    </a> </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseG2Three">
                                @php $total_sale_month = 0 @endphp
                                @foreach($sale_month as $sale)
                                    @php
                                        $total_sale_month += $sale->amount
                                    @endphp
                                @endforeach
                                    <div class="widget-content">
                                        <table class="table table-bordered table-invoice-full">

                                            <tr>
                                                <td style="text-align:center"><strong>Total Sales:</strong> {{ count($sale_month) }}</td>
                                                @if (count($sale_month) > 0) <td style="text-align:center"><strong>Total Amount:</strong> Rs. {{ $total_sale_month }} </td>@endif
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="span6">
                        <div class="accordion" id="collapse-group2">
                            <div class="accordion-group widget-box">
                                <div class="accaordion-heading">
                                    <div class="widget-title"> <a data-parent="#collapse-group2" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><strong>Payments</strong> <i class="icon icon-chevron-down"></i></span>
                                            <h5>This Week</h5>
                                        </a> </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    @php $total_payment_week = 0 @endphp
                                    @foreach($payment_week as $payment)
                                        @php
                                            $total_payment_week += $payment->amount
                                        @endphp
                                    @endforeach
                                        <div class="widget-content">
                                            <table class="table table-bordered table-invoice-full">
                                                <tr>
                                                    <td style="text-align:center"><strong>Total Payments:</strong> {{ count($payment_week) }}</td>
                                                    @if (count($payment_week) > 0) <td style="text-align:center"><strong>Total Amount:</strong> Rs. {{ $total_payment_week }} </td>@endif
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title"> <a data-parent="#collapse-group2" href="#collapseGTwo" data-toggle="collapse"> <span class="icon"><strong>Payments</strong> <i class="icon icon-chevron-down"></i></span>
                                            <h5>This Month</h5>
                                        </a> </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGTwo">
                                    @php $total_payment_week = 0 @endphp
                                    @foreach($payment_week as $payment)
                                        @php
                                            $total_payment_week += $payment->amount
                                        @endphp
                                    @endforeach
                                    <div class="widget-content">
                                        <table class="table table-bordered table-invoice-full">
                                            <tr>
                                                <td style="text-align:center"><strong>Total Payments:</strong> {{ count($payment_month) }}</td>
                                                @if (count($payment_month) > 0) <td style="text-align:center"><strong>Total Amount:</strong> Rs. {{ $total_payment_month }} </td>@endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title"> <a data-parent="#collapse-group2" href="#collapseGThree" data-toggle="collapse"> <span class="icon"><strong>Payments</strong> <i class="icon icon-chevron-down"></i></span>
                                            <h5>This Year</h5>
                                        </a> </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGThree">
                                    @php $total_payment_year = 0 @endphp
                                    @foreach($payment_year as $payment)
                                        @php
                                            $total_payment_year += $payment->amount
                                        @endphp
                                    @endforeach
                                    <div class="widget-content">
                                        <table class="table table-bordered table-invoice-full">
                                            <tr>
                                                <td style="text-align:center"><strong>Total Payments:</strong> {{ count($payment_year) }}</td>
                                                @if (count($payment_year) > 0) <td style="text-align:center"><strong>Total Amount:</strong> Rs. {{ $total_payment_year }} </td>@endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><strong>Transactions</strong></span>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab1">This Week</a></li>
                                <li><a data-toggle="tab" href="#tab2">This Month</a></li>
                            </ul>
                        </div>
                        <div class="widget-content tab-content">
                            <div id="tab1" class="tab-pane active">
                                <table class="table table-bordered table-invoice-full">
                                    <thead>
                                    <tr>
                                        <th class="head0">Date</th>
                                        <th class="head1">Type</th>
                                        <th class="head1">Payment Mode</th>
                                        <th class="head0">Debit</th>
                                        <th class="head1">Credit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($records_week as $record)
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
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab2" class="tab-pane">
                                <table class="table table-bordered table-invoice-full">
                                    <thead>
                                    <tr>
                                        <th class="head0">Date</th>
                                        <th class="head1">Type</th>
                                        <th class="head1">Payment Mode</th>
                                        <th class="head0">Debit</th>
                                        <th class="head1">Credit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($records_month as $record)
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
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. </p>
                                <img src="{{ URL::asset('img/demo/demo-image3.jpg') }}" alt="demo-image"/></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/excanvas.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.flot.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('js/matrix.dashboard.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.gritter.min.js') }}"></script>
    <script src="{{ URL::asset('js/matrix.interface.js') }}"></script>
    <script src="{{ URL::asset('js/matrix.chat.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.js') }}"></script>
    <script src="{{ URL::asset('js/matrix.form_validation.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.uniform.js') }}"></script>
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('js/matrix.popover.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/matrix.tables.js') }}"></script>

    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();
                }
                // else, send page to designated URL
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
    </script>
@endsection