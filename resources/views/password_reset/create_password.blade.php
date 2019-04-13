@extends('layout.app')

@section('master')

    <div class="container">

        <div class="row">

            <h1 class="text-center login-title"><span class="text-primary title-name">محيط</span> للتجارة الإلكترونية</h1>

            <div class="col-md-6 col-centered">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">انشاء كلمة المرور</h3>
                    </div>
                    <div class="panel-body">

                        <form method="POST" action="{{url('/password_reset/create_password/'.$token)}}" role="form">

                            {{csrf_field()}}

                            <div class="form-group">

                                <input name="password" class="form-control" placeholder="كلمة المرور" type="password">

                                <span class="text-danger">{{$errors->first('password')}}</span>

                            </div>

                            <div class="form-group">

                                <input name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" type="password">

                            </div>

                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="انشاء">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection