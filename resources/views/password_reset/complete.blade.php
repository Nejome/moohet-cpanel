@extends('layout.app')

@section('master')

    <div class="container">

        <div class="row">

            <h1 class="text-center login-title"><span class="text-primary title-name">محيط</span> للتجارة الإلكترونية</h1>

            <div class="col-md-6 col-centered bg-info text-center" style="padding: 5px !important; margin-top: 60px !important; border-radius: 8px;">

                <h3>

                    تم اشاء كلمة المرور الجديده الخاصه بك بنجاح ، يمكنك تسجيل الدخول الان بإستخدامها

                    <br>

                    <a href="{{url('/')}}" class="text-primary">تسجيل الدخول</a>

                </h3>

            </div>

        </div>
    </div>

@endsection