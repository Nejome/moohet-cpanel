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
                <a href="{{url('/admin/settings')}}"><i class="fa fa-cog"></i> الإعدادات</a>
            </li>

            <li>
                <a href="{{url('/customers')}}"><i class="fa fa-users" aria-hidden="true"></i> العملاء</a>
            </li>

            <li>
                <a href="{{url('/admin/notifications')}}"><i class="fa fa-bell fa-fw"></i> الإشعارات</a>
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

                    <li>
                        <a href="{{url('/admin/products/abb/create')}}">منتجات 1688</a>
                    </li>

                    <li>

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
                <a href="#"><i class="fa fa-truck" aria-hidden="true"></i> الطلبيات<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('orders.index')}}">عرض الطلبيات</a>
                    </li>

                    <li>
                        <a href="{{url('/admin/orders/arrived_orders')}}">توصيل الطلبيات</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-usd" aria-hidden="true"></i> المعاملات المالية<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{url('/admin/financial/charge_operations')}}">معاملات شحن الرصيد</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-money" aria-hidden="true"></i> طلبات سحب الرصيد<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{url('/admin/money_revoke/orders')}}">الطلبات الجديدة</a>
                    </li>

                    <li>
                        <a href="{{url('/admin/money_revoke/processed_orders')}}">الطلبات المكتملة</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>

</div>
