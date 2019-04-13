@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">بياناتي</h1>
            </div>
        </div>

        <div class="row">

            {{--<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">

                        <div class="col-md-1 text-center home_icon_icon">

                            <i class="fas fa-pen fa-4x icon complete_data"></i>

                        </div>

                        <div class="col-md-6">

                            <h3> إكمل بياناتك لتتمكن من ممارسة  التجارة بفعالية</h3>

                        </div>

                    </div>
                </div>
            </div>--}}

            <div class="col-lg-9 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                         بياناتي

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        @if(session()->has('message'))

                            <p class="alert alert-success">تم تعديل بياناتك بنجاح</p>

                        @endif

                        <form method="POST" action="{{route('customers.update', ['id' => $raw->id])}}" enctype="multipart/form-data" role="form" class="col-md-10">

                            {{csrf_field()}}

                            @method('PUT')

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">الاسم</label>
                                <input name="name" value="{{$raw->name}}" type="text" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">رمز البلد</label>
                                <input name="country_code" value="{{$raw->country_code}}" type="text" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('country_code')}}</span>

                            </div>

                            <div class="form-group row">

                                @if(isset($raw->phone) && $raw->phone != NULL)

                                    <label class="col-md-3 custom_form_label">رقم الهاتف</label>

                                    <input name="phone" value="{{$raw->phone}}" type="text" class="form-control col-md-7" disabled>

                                    <div class="col-md-2 text-left"><a href="{{route('phone_verification.create')}}" class="btn btn-danger">تعديل</a></div>

                                    <span class="text-danger">{{$errors->first('phone')}}</span>

                                @else

                                    <label class="col-md-3 custom_form_label">رقم الهاتف</label>

                                    <a href="{{route('phone_verification.create')}}" class="btn btn-primary">إضافة رقم الهاتف والتحقق منه</a>

                                @endif

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">البلد</label>
                                <input name="country" value="{{$raw->country}}" type="text" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">المدينة</label>
                                <input name="town" value="{{$raw->town}}" type="text" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">العنوان</label>
                                <input name="address" value="{{$raw->address}}" type="text" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">رقم الهوية</label>
                                <input name="identification_number" value="{{$raw->identification_number}}" type="text" class="form-control col-md-9">

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">الصورة الشخصية</label>

                                <input type="file" name="image">

                                <span class="text-danger">{{$errors->first('image')}}</span>

                            </div>

                            @if($raw->user->password != NULL)

                                <div class="text-center">
                                    <a href="{{url('/customers/'.$raw->id.'/change_password')}}" class="btn btn-warning">تعديل كلمة المرور</a>
                                </div>

                                @else

                                <div class="text-center">
                                    <a href="{{url('/customers/'.$raw->id.'/change_password')}}" class="btn btn-primary">اضافة كلمة مرور</a>
                                </div>

                            @endif

                            <hr>

                            <div class="text-center">

                                <button type="submit" class="btn btn-success">حفظ البيانات</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection