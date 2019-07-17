<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{url('/home')}}">
            <img src="{{asset('images/4.png')}}" class="navbar-brand-img">
        </a>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">

            <li class="nav-item dropdown">

                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset(Auth::user()->image) && Auth::user()->image != '')
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{asset('images/'.Auth::user()->image)}}">
                        </span>
                        </div>
                    @else
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{asset('images/man2.png')}}">
                        </span>
                        </div>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right text-right">

                    <a href="{{url('/customers/'.Auth::user()->customer->id.'/edit')}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>ملفي الشخصي</span>
                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="{{url('/logout')}}" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>تسجيل الخروج</span>
                    </a>
                </div>

            </li>
        </ul>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{url('/home')}}">
                            <img src="{{asset('images/4.png')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Navigation -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">
                        <i class="ni ni-tv-2 text-primary"></i> لوحة التحكم
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/customers/'.Auth::user()->customer->id.'/edit')}}">
                        <i class="ni ni-single-02 text-indigo"></i> ملفي الشخصي
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('notifications.index')}}">
                        <i class="fas fa-bell text-yellow"></i>الإشعارات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('customers_orders.index')}}">
                        <i class="fas fa-shipping-fast text-cyan"></i> طلباتي
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/my_products/'.Auth::user()->customer->id)}}">
                        <i class="fas fa-shopping-cart text-success"></i> منتجاتي
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/my_wallet/info')}}">
                        <i class="fas fa-wallet text-info"></i> محفظتي
                    </a>
                </li>

            </ul>

            <hr class="my-3">

            <h6 class="navbar-heading text-muted">الرصيد</h6>

            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-money-check-alt"></i> شحن رصيد
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-credit-card"></i> سحب رصيد
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-th-list"></i> طلبات سحب الرصيد
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
