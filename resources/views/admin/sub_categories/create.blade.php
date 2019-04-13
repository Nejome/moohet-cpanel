@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">إضافة تصنيف فرعي جديد</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-9 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        إضافة تصنيف فرعي جديد

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{route('sub_categories.store')}}" enctype="multipart/form-data" role="form" class="col-md-10">

                            {{csrf_field()}}

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">إسم التصنيف</label>
                                <input name="title" value="{{old('title')}}" placeholder="إسم التصنيف" type="text" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('title')}}</span>

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">الفئة الام</label>

                                <select name="category_id" class="form-control col-md-9">

                                    <option value="" disabled selected>اختر الفئة الام</option>

                                    @foreach($categories as $row)

                                        <option value="{{$row->id}}">{{$row->title}}</option>

                                    @endforeach

                                </select>

                                <span class="text-danger">{{$errors->first('title')}}</span>

                            </div>


                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">صورة التصنيف</label>

                                <input type="file" name="image" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('image')}}</span>

                            </div>

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">النشاط</label>

                                <div class="col-md-9">

                                    <div style="display: inline-block; margin: 0 15px;">

                                        <input id="active" type="radio" name="active" value="1" checked>

                                        <label for="active">نشط</label>

                                    </div>

                                    <div style="display: inline-block; margin: 0 15px;">

                                        <input id="in_active" type="radio" name="active" value="0">

                                        <label for="in_active">غير نشط</label>

                                    </div>

                                </div>

                            </div>

                            <div class="text-center">

                                <button type="submit" class="btn btn-primary">إضافة</button>

                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection