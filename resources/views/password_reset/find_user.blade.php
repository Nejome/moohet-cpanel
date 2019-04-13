@extends('layout.app')

@section('master')

    <div class="container">

        <div class="row">

            <div class="col-md-3 text-center col-centered" style="margin-top: 50px !important;"><img src="{{asset('images/4.png')}}" width="100%"></div>

            <div class="col-md-6 col-centered">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">إستعادة كلمة المرور</h3>
                    </div>
                    <div class="panel-body">

                        @if(session()->has('user_not_founded'))

                            <div class="alert alert-danger">{{session()->get('user_not_founded')}}</div>

                        @endif

                        <form method="POST" action="{{url('/password_reset/find_user')}}" role="form">

                            {{csrf_field()}}

                            <p>قم بإدخال بريدك الالكتروني لإستعادة كلمة المرور</p>

                            <div class="form-group">

                                <input name="email" class="form-control" placeholder="البريد الإلكتروني" type="email">

                                <span class="text-danger">{{$errors->first('email')}}</span>

                            </div>

                            <input type="submit" class="btn btn-lg btn-block" style="background: #0099cb !important; color: #ffffff;" value="ارسال">

                            <a href="{{url('/')}}" class="btn btn-default btn-block">رجوع</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection