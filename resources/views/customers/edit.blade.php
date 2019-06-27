@extends('layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')


    <!-- Main content -->
    <div class="main-content">

        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">لوحة التحكم</a>

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">

                                @if(isset(Auth::user()->image) && Auth::user()->image != '')

                                    <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{asset('images/'.Auth::user()->image)}}">

                                </span>

                                @else

                                    <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{asset('images/man2.png')}}">

                                </span>

                                @endif

                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->customer->name}}</span>
                                </div>

                            </div>
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
            </div>
        </nav>

        <!-- Header -->
        <div class="header d-flex align-items-center" style="min-height: 450px; background-image: url({{asset('argon/assets/img/theme/profile_bg1.jpg')}}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-primary opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">مرحباً {{Auth::user()->customer->name}}</h1>
                        <p class="text-white mt-0 mb-5">هذه هي صفحة ملفك الشخصي ، يمكنك من هنا تعديل كافة بياناتك الشخصية ومتابعة كافة إحصائياتك في منصة محيط</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">

                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        @if(isset(Auth::user()->image) && Auth::user()->image != '')
                                            <img src="{{asset('images/'.Auth::user()->image)}}" class="rounded-circle">
                                        @else
                                            <img src="{{asset('images/man2.png')}}" class="rounded-circle">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">

                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading">22</span>
                                            <span class="description">طلباتي</span>
                                        </div>
                                        <div>
                                            <span class="heading">10</span>
                                            <span class="description">منتجاتي</span>
                                        </div>
                                        <div>
                                            <span class="heading">89</span>
                                            <span class="description">رصيدي</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    Jessica Jones<span class="font-weight-light">, 27</span>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>Bucharest, Romania
                                </div>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>University of Computer Science
                                </div>
                                <hr class="my-4" />
                                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                                <a href="#">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">بياناتي</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>

                                <div class="pl-lg-4">

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">الإسم</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">البريد الإلكتروني</label>
                                                <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">رقم الهوية</label>
                                                <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">رمز البلد</label>
                                                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr class="my-4" />

                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">العنوان</label>
                                                <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">البلد</label>
                                                <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">المدينة</label>
                                                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush