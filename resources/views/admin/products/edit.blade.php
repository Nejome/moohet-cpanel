@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تعديل منتج</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تعديل منتج

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{route('products.update', ['id' => $product->id])}}" enctype="multipart/form-data" role="form" class="col-md-10">

                            {{csrf_field()}}

                            @method('PUT')

                            <div class="row">

                                <div class="col-md-12">

                                    <h4 style="text-decoration: underline; font-weight: bold">المعلومات الاساسية</h4>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">إسم المنتج</label>

                                    <input name="name" value="{{$product->name}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('name')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">تصنيف المنتج</label>

                                    <select name="sub_category_id" class="form-control">

                                        @foreach($categories as $category)

                                            <option disabled>--{{$category->title}}--</option>

                                            @foreach($category->active_sub_categories() as $sub_category)

                                                <option value="{{$sub_category->id}}" style="color: black" @if($product->sub_category_id == $sub_category->id) selected @endif>{{$sub_category->title}}</option>

                                            @endforeach

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="custom_form_label">تفاصيل المنتج</label>

                                <textarea name="description" rows="7" class="form-control">

                                    {{$product->description}}

                                </textarea>

                                <div class="text-center">
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رمز المنتج الاساسي</label>

                                    <input name="primary_code" value="{{$product->primary_code}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('primary_code')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رمز المنتج الفرعي</label>

                                    <input name="secondary_code" value="{{$product->secondary_code}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('secondary_code')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رمز التعريفة الجمركية</label>

                                    <input name="tariff_code" value="{{$product->tariff_code}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('tariff_code')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">النشاط</label>

                                    <div>

                                        <div style="display: inline-block; margin: 0 15px;">

                                            <input id="active" type="radio" name="active" value="1"  @if($product->active == 1) checked @endif>

                                            <label for="active">نشط</label>

                                        </div>

                                        <div style="display: inline-block; margin: 0 15px;">

                                            <input id="in_active" type="radio" name="active" value="0" @if($product->active == 0) checked @endif>

                                            <label for="in_active">غير نشط</label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="row">


                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">تمييز اقل كمية للمنتج</label>

                                    <input name="less_amount_text" value="{{$product->less_amount_text}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('less_amount_text')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">اقل كمية للمنتج</label>

                                    <input name="less_amount_value" value="{{$product->less_amount_value}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('less_amount_value')}}</span>

                                </div>


                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">فترة الانتظار</label>

                                    <input name="waiting_period" value="{{$product->waiting_period}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('waiting_period')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">لون المنتج</label>

                                    <input name="color" value="{{$product->color}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('color')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">السعر</label>

                                    <input name="price" value="{{$product->price}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('price')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">التخفيض %</label>

                                    <input name="discount" value="{{$product->discount}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('discount')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">اسم الشركة</label>

                                    <input name="company" value="{{$product->company}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('company')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رابط موقع الشركة</label>

                                    <input name="company_website" value="{{$product->company_website}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('company_website')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">تمييز الحجم</label>

                                    <input name="size_text" value="{{$product->size_text}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('size_text')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">حجم المنتج</label>

                                    <input name="size_value" value="{{$product->size_value}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('size_value')}}</span>

                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-12">

                                    <h4 style="text-decoration: underline; font-weight: bold">صور المنتج</h4>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label"> صورة 1</label>

                                    @if(isset($product_images[0]->name) && $product_images[0]->name != '')

                                        <img src="{{asset('images/'.$product_images[0]->name)}}" width="100%" height="300px;" style="margin-bottom: 10px;">

                                        <input name="image1_id" type="hidden" value="{{$product_images[0]->id}}">

                                    @endif

                                    <input type="file" name="image1" class="form-control">

                                    <span class="text-danger">{{$errors->first('image1')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">صورة 2</label>

                                    @if(isset($product_images[1]->name) && $product_images[1]->name != '')

                                        <img src="{{asset('images/'.$product_images[1]->name)}}" width="100%" height="300px;" style="margin-bottom: 10px;">

                                        <input name="image2_id" type="hidden" value="{{$product_images[1]->id}}">

                                    @endif

                                    <input type="file" name="image2" class="form-control">

                                    <span class="text-danger">{{$errors->first('image2')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label"> صورة 3</label>

                                    @if(isset($product_images[2]->name) && $product_images[2]->name != '')

                                        <img src="{{asset('images/'.$product_images[2]->name)}}" width="100%" height="300px;" style="margin-bottom: 10px;">

                                        <input name="image3_id" type="hidden" value="{{$product_images[2]->id}}">

                                    @endif

                                    <input type="file" name="image3" class="form-control">

                                    <span class="text-danger">{{$errors->first('image3')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">صورة 4</label>

                                    @if(isset($product_images[3]->name) && $product_images[3]->name != '')

                                        <img src="{{asset('images/'.$product_images[3]->name)}}" width="100%" height="300px;" style="margin-bottom: 10px;">

                                        <input name="image4_id" type="hidden" value="{{$product_images[3]->id}}">

                                    @endif

                                    <input type="file" name="image4" class="form-control">

                                    <span class="text-danger">{{$errors->first('image4')}}</span>

                                </div>

                            </div>

                            <div class="text-center" style="margin-top: 30px">

                                <button type="submit" class="btn btn-warning">تعديل</button>

                                <a href="{{route('products.index')}}" class="btn btn-default">رجوع</a>

                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection