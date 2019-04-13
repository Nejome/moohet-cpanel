@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تعديل فئة</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-9 col-centered">

                @if(session()->has('unable_to_delete'))

                    <div class="alert alert-danger">{{session()->get('unable_to_delete')}}</div>

                @endif

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تعديل فئة

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{route('categories.update', ['id' => $row->id])}}" enctype="multipart/form-data" role="form" class="col-md-10">

                            {{csrf_field()}}

                            @method('PUT')

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">إسم الفئة</label>
                                <input name="title" value="{{$row->title}}" type="text" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('title')}}</span>

                            </div>


                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">صورة الفئة</label>

                                <div class="col-md-9 row">

                                    <div class="col-md-5">

                                        <img src="{{asset('images/'.$row->image)}}" width="100%" height="150px;">

                                    </div>

                                    <div class="col-md-7">

                                        <input type="file" name="image" class="form-control">

                                        <span class="text-danger">{{$errors->first('image')}}</span>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">النشاط</label>

                                <div class="col-md-9">

                                    <div style="display: inline-block; margin: 0 15px;">

                                        <input id="active" type="radio" name="active" value="1" @if($row->active == 1) checked @endif>

                                        <label for="active">نشط</label>

                                    </div>

                                    <div style="display: inline-block; margin: 0 15px;">

                                        <input id="in_active" type="radio" name="active" value="0" @if($row->active == 0) checked @endif>

                                        <label for="in_active">غير نشط</label>

                                    </div>

                                </div>

                            </div>

                            <div class="text-center">

                                <input type="submit" class="btn btn-warning" value="تعديل">

                                <a href="{{route('categories.index')}}" class="btn btn-primary">رجوع</a>

                                <a href="{{url('/admin/categories/'.$row->id.'/delete')}}" class="btn btn-danger" style="float: left;">حذف</a>

                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection

