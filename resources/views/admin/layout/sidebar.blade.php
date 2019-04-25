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

                    <p style="margin-bottom: 0 !important;">{{Auth::user()->name}}</p>

                @endif

            </li>

            <li>

                <a href="{{url('/admin')}}"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>

            </li>

            <li>
                <a href="{{url('/customers')}}"><i class="fa fa-users" aria-hidden="true"></i> العملاء</a>
            </li>

            <li>
                <a href="{{route('messages.index')}}"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> الرسائل</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>المنتجات<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('products.index')}}">إدارة المنتجات</a>
                    </li>

                    <li class="">

                        <a href="#">الفئات والتصنيفات<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse" style="height: 0px;">

                            <li>
                                <a href="{{route('categories.index')}}">ادارة الفئات</a>
                            </li>

                            <li>
                                <a href="{{route('sub_categories.index')}}">ادارة التصنيفات الفرعية</a>
                            </li>

                        </ul>

                    </li>

                </ul>

            </li>

            <li>
                <a href="{{route('orders.index')}}"><i class="fa fa-truck" aria-hidden="true"></i> الطلبيات</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-usd" aria-hidden="true"></i> المعاملات المالية<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{url('/admin/financial/charge_operations')}}">معاملات شحن الرصيد</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>

</div>
