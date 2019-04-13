@extends('layout.app')

@section('master')

    <div class="registration_header">
        <div class="container">

            <a href="#" class="logo">

                <img src="{{asset('images/6.png')}}">

            </a>

            <h3><span class="website_name">محيط</span> للتجارة الإلكترونية</h3>

        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="sign_up_title col-12">

                <h1 class="title">قم بالبدء</h1>

                <h2 class="sub_title">الآن بإمكانك تحقيق الأرباح من التجارة الإلكترونية بكل سهولة</h2>

            </div>

            @if(session()->has('mail_sending_error'))

                <div class="alert alert-danger">{{session()->get('mail_sending_error')}}</div>

            @endif

            <div class="col-sm-6 col-md-4 col-md-push-2">

                <form method="POST" action="{{url('/customers/verify_email')}}">

                    {{csrf_field()}}

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label class="form_label">الإسم</label>
                            <input name="name" type="text" class="form_input" value="{{old('name')}}">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label class="form_label">البريد الإلكتروني</label>
                            <input name="email" type="email" class="form_input" value="{{old('email')}}">
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label class="form_label">كلمة المرور</label>
                            <input name="password" type="password" class="form_input">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label class="form_label">تأكيد كلمة المرور</label>
                            <input name="password_confirmation" type="password" class="form_input">
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">

                            <input type="submit" class="customer_submit_btn" value="تسجيل">

                        </div>
                    </div>

                </form>

                <hr>

                <div class="row">
                    <div class="form-group col-xs-12">

                        <a href="{{url('/register/redirect')}}" class="customer_google_btn2">

                            <i class="fa fa-google google_icon" aria-hidden="true"></i>

                            تسجيل الدخول بإستخدام قوقل

                        </a>

                    </div>
                </div>

            </div>

            <div class="col-sm-6 col-md-4 text-center col-md-push-2 phone_hide">
                <img src="{{asset('images/2.png')}}" style="width: 100%; max-width: 320px;"><!--image.png-->
            </div>

        </div>

    </div>

@endsection