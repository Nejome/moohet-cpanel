@extends('admin.layout.master')

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

                    <div class="panel-heading">

                        تعديل بياناتي

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        @if(session()->has('message'))

                            <p class="alert alert-success">تم تعديل بياناتك بنجاح</p>

                        @endif

                        <form method="POST" action="{{route('users.update' , $user->id)}}" enctype="multipart/form-data" role="form" class="col-md-10">

                            @method('PUT')

                            {{csrf_field()}}

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">الاسم</label>
                                <input name="name" value="{{$user->name}}" type="text" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">البريد الإلكتروني</label>
                                <input name="email" value="{{$user->email}}" type="email" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">الصورة الشخصية</label>

                                <input type="file" name="image">

                                <span class="text-danger">{{$errors->first('image')}}</span>

                            </div>

                            <hr>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">كلمة المرور الحالية</label>
                                <input name="current_password" type="password" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">كلمة المرور الجديده</label>
                                <input name="password" type="password" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">تأكيد كلمة المرور الجديده</label>
                                <input name="password_confirmation" type="password" class="form-control col-md-9">

                            </div>

                            <div class="text-center">

                                <button type="submit" class="btn btn-warning">تعديل</button>

                            </div>

                        </form>

                    </div>

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

@endsection