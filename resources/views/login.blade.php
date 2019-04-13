@extends('layout.app')

@section('master')

    <div class="container">

        <div class="row">


            <div class="col-md-3 text-center col-centered" style="margin-top: 50px !important;"><img src="{{asset('images/4.png')}}" width="100%"></div>

            <div class="col-md-5 col-centered">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تسجيل الدخول</h3>
                    </div>
                    <div class="panel-body">

                        @if(session()->has('exist_msg'))

                            <div class="alert alert-danger">{{session()->get('exist_msg')}}</div>

                        @endif

                        <form method="POST" action="{{url('/login')}}" role="form">

                            {{csrf_field()}}

                            <div class="form-group">
                                <input name="email" class="form-control" placeholder="البريد الإلكتروني" type="email">
                            </div>

                            <div class="form-group">
                                <input name="password" class="form-control" placeholder="كلمة المرور" type="password">
                            </div>

                            <input type="submit" class="btn btn-lg btn-block" style="background: #0099cb !important; color: #ffffff;" value="تسجيل الدخول">

                            <div class="text-center" style="margin-top: 25px !important;">

                                <a href="{{url('/password_reset/find_user')}}" style="color: #0099cb !important;">هل نسيت كلمة المرور ؟</a>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="form-group col-xs-12">

                                    <a href="{{url('/register/redirect')}}" class="customer_google_btn2">

                                        <i class="fa fa-google google_icon" aria-hidden="true"></i>

                                        تسجيل الدخول بإستخدام قوقل

                                    </a>

                                </div>
                            </div>

                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection