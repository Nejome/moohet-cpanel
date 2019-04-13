@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">إضافة مدير</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-8 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        إضافة مدير

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{url('/admin/users')}}" role="form" class="col-md-10">

                            {{csrf_field()}}

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">اسم المدير</label>
                                <input name="name" type="text" placeholder="ادخل اسم المدير" class="form-control col-md-9">

                                {{--<p class="help-block">Example block-level help text here.</p>--}}

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">البريد الإلكتروني</label>
                                <input name="email" type="email" placeholder="ادخل البريد الإلكتروني" class="form-control col-md-9">

                                {{--<p class="help-block">Example block-level help text here.</p>--}}

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">كلمة المرور</label>
                                <input name="password" type="password" placeholder="ادخل كلمة المرور" class="form-control col-md-9">

                                {{--<p class="help-block">Example block-level help text here.</p>--}}

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">تأكيد كلمة المرور</label>
                                <input name="password_confirmation" type="password" placeholder="ادخل تأكيد كلمة المرور" class="form-control col-md-9">

                                {{--<p class="help-block">Example block-level help text here.</p>--}}

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 ">النشاط</label>

                                <div class="col-md-9">


                                    <label class="radio-inline" for="active">نشط</label>

                                    <input type="radio" name="activity" id="active" value="1" checked>

                                    <label class="radio-inline" for="blocked">موقف</label>

                                    <input type="radio" name="activity" id="blocked" value="0">

                                </div>

                            </div>

                            <div class="text-center">

                                <button type="submit" class="btn btn-primary">إضافة</button>

                                <button type="reset" class="btn btn-danger">إلغاء</button>

                            </div>

                        </form>

                    </div>

                </div>

                {{--@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif--}}

            </div>

        </div>

    </div>

@endsection