@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">التحقق من رقم الهاتف</h1>
            </div>
        </div>

        <div class="col-lg-6 col-centered">

            <div class="panel panel-default">

                <div class="panel-heading">

                    التحقق من رقم الهاتف

                </div>

                <div class="panel-body row" style="padding: 40px;">

                    <form method="POST" action="{{url('/phone_verification/generate_code/'.Auth::user()->customer->id)}}" role="form">

                        {{csrf_field()}}

                        @if(session()->has('sent_message'))

                            <div class="alert alert-success">{{session()->get('sent_message')}}</div>

                        @endif

                        @if(session()->has('error_message'))

                            <div class="alert alert-warning">{{session()->get('error_message')}}</div>

                        @endif

                        @if(session()->has('wrong_code'))

                            <div class="alert alert-danger">{{session()->get('wrong_code')}}</div>

                        @endif

                        <div class="row">

                            <div class="form-group row col-md-10">

                                <label class="col-md-4 custom_form_label">رقم الهاتف</label>
                                <input name="phone" placeholder="أدخل رقم الهاتف الخاص بك" type="text" class="form-control col-md-8">

                                <span class="text-danger">{{$errors->first('phone')}}</span>

                            </div>

                            <div class="text-center col-md-2">

                                <button type="submit" class="btn btn-primary">إضافة</button>

                            </div>

                        </div>

                    </form>

                    <h4>في حال تم إرسال الكود قم بإدخاله هنا</h4>

                    <form method="POST" action="{{url('/phone_verification/check_code/'.Auth::user()->customer->id)}}" role="form">

                        {{csrf_field()}}

                        <div class="row">

                            <div class="form-group row col-md-10">

                                <label class="col-md-4 custom_form_label">كود التحقق</label>
                                <input name="code" placeholder="أدخل كود التحقق المرسل" type="text" class="form-control col-md-8">

                                <span class="text-danger">{{$errors->first('code')}}</span>

                            </div>

                            <div class="text-center col-md-2">

                                <button type="submit" class="btn btn-success">تحقق</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection