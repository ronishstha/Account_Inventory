<!--sidebar-menu-->
<style>
    .extra{
        margin:0 20px 0 0;
        float:right;
    }
</style>
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{ Request::is('/') ? 'class=active' : '' }}><a href="{{ route('dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li @if(Request::is('customer*')) class="active submenu" @endif class="submenu"> <a href="#"><i class="icon icon-group"></i> <span>Customers</span> <span class="extra"><i class="icon icon-chevron-down"></i></span></a>
            <ul>
                <li><a href="{{ route('customer') }}">Customer</a></li>
                <li><a href="{{ route('customer.get.create') }}">Create Customer</a></li>
                <li><a href="{{ route('customer.delete.page') }}">Trash</a></li>
            </ul>
        </li>
            <li @if(Request::is('sale*')) class="active submenu" @endif class="submenu"> <a href="#"><i class="icon icon-book"></i> <span>Sales</span> <span class="extra"><i class="icon icon-chevron-down"></i></span></a>
            <ul>
                <li><a href="{{ route('sale') }}">Sale</a></li>
                <li><a href="{{ route('sale.get.create') }}">Create Sale</a></li>
                <li><a href="{{ route('sale.delete.page') }}">Trash</a></li>
            </ul>
        </li>
        <li @if(Request::is('payment*')) class="active submenu" @endif class="submenu"> <a href="#"><i class="icon icon-credit-card"></i> <span>Payments</span> <span class="extra"><i class="icon icon-chevron-down"></i></span></a>
            <ul>
                <li><a href="{{ route('payment') }}">Payment</a></li>
                <li><a href="{{ route('payment.get.create') }}">Create Payment</a></li>
                <li><a href="{{ route('payment.delete.page') }}">Trash</a></li>
            </ul>
        </li>
        <li> <a href="{{ route('widgets') }}"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
    </ul>
</div>