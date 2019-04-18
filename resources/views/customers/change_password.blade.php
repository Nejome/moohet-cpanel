@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">بياناتي</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-9 col-centered">

                <div class="panel panel-default">

                    <div class="panel-body row" style="padding: 40px;">

                        @if(session()->has('password_changed'))

                            <div class="alert alert-success">{{session()->get('password_changed')}}</div>

                        @endif

                        <form method="POST" action="{{url('customers/'.$customer->id.'/change_password_store')}}" role="form" class="col-md-10">

                            {{csrf_field()}}

                            @if($customer->user->password != NULL)

                                <h4 class="text-center">تعديل كلمة المرور</h4>

                                <div class="form-group row">

                                    <label class="col-md-3 custom_form_label">كلمة المرور الحالية</label>
                                    <input name="current_password" type="password" class="form-control col-md-9">

                                    <span class="text-danger">{{$errors->first('incorrect_password')}}</span>
                                    <span class="text-danger">{{$errors->first('current_password')}}</span>

                                </div>

                                <div class="form-group row">

                                    <label class="col-md-3 custom_form_label">كلمة المرور الجديده</label>
                                    <input name="password" type="password" class="form-control col-md-9">
                                    <span class="text-danger">{{$errors->first('password')}}</span>

                                </div>

                                <div class="form-group row">

                                    <label class="col-md-3 custom_form_label">تأكيد كلمة المرور الجديده</label>
                                    <input name="password_confirmation" type="password" class="form-control col-md-9">

                                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                                </div>

                            @else

                                <h4 class="text-center">إنشاء كلمة مرور جديده</h4>

                                <div class="form-group row">

                                    <label class="col-md-3 custom_form_label">كلمة المرور الجديده</label>
                                    <input name="password" type="password" class="form-control col-md-9">

                                    <span class="text-danger">{{$errors->first('password')}}</span>

                                </div>

                                <div class="form-group row">

                                    <label class="col-md-3 custom_form_label">تأكيد كلمة المرور الجديده</label>
                                    <input name="password_confirmation" type="password" class="form-control col-md-9">

                                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                                </div>

                            @endif

                            <div class="text-center">

                                <a href="{{url('/customers/'.$customer->id.'/edit')}}" class="btn btn-default">رجوع</a>

                                <button type="submit" class="btn btn-warning">تعديل</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection