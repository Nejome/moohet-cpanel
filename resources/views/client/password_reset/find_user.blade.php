@extends('app')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('master')

    <body class="bg-default">

    <div class="main-content">

        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="{{url('/')}}">
                    <span style="color: white; font-size: 30px;">محيط</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="#">
                                    <img src="{{asset('images/4.png')}}">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{url('/customers/create')}}">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">انشاء حساب</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{url('/')}}">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">تسجيل الدخول</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">إستعادة كلمة المرور</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent">

                            <div class="text-muted text-center mt-2 mb-3"><small>قم بإدخال بريدك الالكتروني لإستعادة كلمة المرور</small></div>

                            @if(session()->has('user_not_founded'))

                                <div class="alert alert-danger">{{session()->get('user_not_founded')}}</div>

                            @endif

                        </div>
                        <div class="card-body px-lg-5 py-lg-5">

                            <form method="POST" action="{{url('/password_reset/find_user')}}" role="form">

                                {{csrf_field()}}

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="البريد الإلكتروني" type="email" name="email">
                                    </div>
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>


                                <div class="text-center">
                                    <a href="{{url('/')}}" class="btn btn-secondary">رجوع</a>
                                    <input type="submit" class="btn btn-primary my-4" value="ارسال">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">

                        <div class="col-6 text-right">
                            <a href="#" class="text-light"><small>انشاء حساب جديد</small></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">

                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">محيط</a>
                    </div>
                </div>

                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">

                        <li class="nav-item">
                            <a href="{{url('/customers/create')}}" class="nav-link text-light">انشاء حساب</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link text-light">تسجيل الدخول</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </footer>

    </body>

@endsection

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush