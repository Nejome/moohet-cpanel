@extends('layout.app')

@section('master')

    <div class="container">

        <div class="row">

            <h1 class="text-center login-title"><span class="text-primary title-name">محيط</span> للتجارة الإلكترونية</h1>

            <div class="col-md-6 col-centered bg-danger text-center" style="padding: 5px !important; margin-top: 60px !important; border-radius: 8px;">

                <h3>

                    رابط التحقق هذا غير صحيح ، او قد تم استخدامه ، قم بإعادة اجراءات استراداد كلمة المرور

                    <br>

                    <a href="{{url('/')}}" class="text-primary">تسجيل الدخول</a>

                </h3>

            </div>

        </div>
    </div>

@endsection