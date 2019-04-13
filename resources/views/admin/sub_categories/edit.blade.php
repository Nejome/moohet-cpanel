@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تعديل تصنيف فرعي</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-9 col-centered">

                @if(session()->has('delete_error_msg'))

                    <div class="alert alert-danger">{{session()->get('delete_error_msg')}}</div>

                @endif

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تعديل تصنيف فرعي

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{route('sub_categories.update', ['sub_category' => $sub_category->id])}}" enctype="multipart/form-data" role="form" class="col-md-10">

                            {{csrf_field()}}

                            @method('put')

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">إسم التصنيف</label>
                                <input name="title" value="{{$sub_category->title}}" type="text" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('title')}}</span>

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">الفئة الام</label>

                                <select name="category_id" class="form-control col-md-9">

                                    <option value="" disabled selected>اختر الفئة الام</option>

                                    @foreach($categories as $row)

                                        <option value="{{$row->id}}" @if($row->id == $sub_category->category_id) selected @endif>{{$row->title}}</option>

                                    @endforeach

                                </select>

                                <span class="text-danger">{{$errors->first('title')}}</span>

                            </div>


                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">صورة التصنيف</label>

                                <div class="col-md-9 row">

                                    <div class="col-md-5">

                                        <img src="{{asset('images/'.$sub_category->image)}}" width="100%" height="150px;">

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

                                        <input id="active" type="radio" name="active" value="1" @if($sub_category->active == 1) checked @endif>

                                        <label for="active">نشط</label>

                                    </div>

                                    <div style="display: inline-block; margin: 0 15px;">

                                        <input id="in_active" type="radio" name="active" value="0" @if($sub_category->active == 0) checked @endif>

                                        <label for="in_active">غير نشط</label>

                                    </div>

                                </div>

                            </div>

                            <div class="text-center">

                                <button type="submit" class="btn btn-warning">تعديل</button>

                                <a href="{{route('sub_categories.index')}}" class="btn btn-primary">رجوع</a>

                                <a href="{{url('/admin/sub_categories/'.$sub_category->id.'/delete')}}" class="btn btn-danger" style="float: left;">حذف</a>

                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection