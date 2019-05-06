<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li class="sidebar-search">

                <div class="sidebar_image_container">

                    @if(isset(Auth::user()->image) && Auth::user()->image != '')

                        <img src="{{asset('images/'.Auth::user()->image)}}">

                    @else

                        <img src="{{asset('images/man2.png')}}">

                    @endif

                </div>

                @if(Auth::check())

                    <p>{{Auth::user()->customer->name}}</p>

                @endif

            </li>

            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>
            </li>

            <li>
                <a href="{{route('notifications.index')}}"><i class="fa fa-bell fa-fw"></i> الإشعارات</a>
            </li>

            <li>
                <a href="{{route('customers_orders.index')}}"><i class="fa fa-table fa-fw"></i> طلباتي</a>
            </li>

            <li>
                <a href="{{url('/store/my_products/'.Auth::user()->customer->id)}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> منتجاتي</a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    محفظتي
                    <span class="balance_value">{{number_format(Auth::user()->customer->wallet->current_balance, 2)}} ريال سعودي</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{url('/my_wallet/'.Auth::user()->customer->id)}}">المعلومات الإساسية</a>
                    </li>

                    <li>
                        <a href="{{url('/my_wallet/'.Auth::user()->customer->id.'/charge')}}">شحن الرصيد</a>
                    </li>

                    <li>
                        <a href="{{url('/my_wallet/'.Auth::user()->customer->id.'/transaction_list')}}">قائمة معاملات الشحن</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>

</div>
