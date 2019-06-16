@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">إضافة منتج 1688</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                         إضافة منتج 1688

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{url('/admin/products/abb/store')}}" role="form" class="col-md-10">

                            {{csrf_field()}}

                            <div class="row">

                                <div class="col-md-12">

                                    <h4 style="text-decoration: underline; font-weight: bold">المعلومات الاساسية</h4>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">إسم المنتج</label>

                                    <input name="name" value="{{$product['title']}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('name')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">تصنيف المنتج</label>

                                    <select name="sub_category_id" class="form-control">

                                        @foreach($categories as $category)

                                            <option disabled>--{{$category->title}}--</option>

                                            @foreach($category->active_sub_categories() as $sub_category)

                                                <option value="{{$sub_category->id}}" style="color: black" @if(old('sub_category_id') == $sub_category->id) selected @endif>{{$sub_category->title}}</option>

                                            @endforeach

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="custom_form_label">تفاصيل المنتج</label>

                                <textarea name="description" rows="7" class="form-control">

                                    {{$product['description']}}

                                </textarea>

                                <div class="text-center">
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رمز المنتج الاساسي</label>

                                    <input value="{{$product['primary_code']}}" class="form-control" disabled>

                                    <input type="hidden" name="primary_code" value="{{$product['primary_code']}}">
                                    <input type="hidden" name="category_id" value="{{$product['category_id']}}">

                                    <span class="text-danger">{{$errors->first('primary_code')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رمز المنتج الفرعي</label>

                                    <input name="secondary_code" value="{{old('secondary_code')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('secondary_code')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رمز التعريفة الجمركية</label>

                                    <input name="tariff_code" value="{{old('tariff_code')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('tariff_code')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">النشاط</label>

                                    <div>

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

                            </div>

                            <hr>

                            <div class="row">


                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">تمييز اقل كمية للمنتج</label>

                                    <input name="less_amount_text" value="{{old('less_amount_text')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('less_amount_text')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">اقل كمية للمنتج</label>

                                    <input name="less_amount_value" value="{{old('less_amount_value')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('less_amount_value')}}</span>

                                </div>


                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">فترة الانتظار</label>

                                    <input name="waiting_period" value="{{old('waiting_period')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('waiting_period')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">لون المنتج</label>

                                    <input name="color" value="{{old('color')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('color')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">السعر</label><br>

                                    <input name="price" value="{{$product['price']}}" type="text" class="form-control">

                                    <span class="text-danger">هذا السعر بالدولار ، قم بتحويل القيمية الي ريال سعودي ومن ثم اعادة ادخالها</span>

                                    <span class="text-danger">{{$errors->first('price')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">التخفيض%</label>

                                    <input name="discount" value="0" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('discount')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">اسم الشركة</label>

                                    <input name="company" value="{{$product['company']}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('company')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">رابط موقع الشركة</label>

                                    <input name="company_website" value="{{$product['company_url']}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('company_website')}}</span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">تمييز الحجم</label>

                                    <input name="size_text" value="{{old('size_text')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('size_text')}}</span>

                                </div>

                                <div class="form-group col-md-6">

                                    <label class="custom_form_label">حجم المنتج</label>

                                    <input name="size_value" value="{{old('size_value')}}" type="text" class="form-control">

                                    <span class="text-danger">{{$errors->first('size_value')}}</span>

                                </div>

                            </div>

                            <hr>

                            <div class="text-center">

                                <button type="submit" class="btn btn-primary">الخطوة التالية</button>

                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection