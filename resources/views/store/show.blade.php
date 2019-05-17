@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تفاصيل المنتج</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">

                @if(session()->has('edit_success')) <div class="alert alert-info"> {{session()->get('edit_success')}} </div> @endif

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تفاصيل المنتج

                    </div>

                    <div class="panel-body">

                        <form method="POST" action="{{url('/my_products/'.$store->id.'/edit')}}">

                            {{csrf_field()}}

                            <div class="row">

                                <div class="col-md-8">

                                    <h1>{{$store->product->name}}</h1>

                                    <div class="row">


                                        <div class="form-group row col-md-6">

                                            <label class="col-md-5 custom_form_label text-primary">الكمية</label>

                                            <label class="col-md-7" style="padding-top: 12px;">{{$store->amount}} {{$store->product->less_amount_text}}</label>

                                        </div>

                                        <div class="form-group row col-md-6">

                                            <label class="col-sm-5 custom_form_label text-primary">سعر البيع</label>

                                            <input name="selling_price" class="form-control col-sm-7" style="padding-top: 12px;" value="{{$store->selling_price}}">

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group row col-md-6">

                                            <label class="col-md-7 custom_form_label text-primary">بيع في فيس بوك</label>

                                            <div class="col-md-5" style="padding-top: 10px;">

                                                <div class="form-check" style="display: inline-block; margin-left: 22px;">
                                                    <input class="form-check-input" type="radio" name="facebook" id="facebook_yes" value="1" @if($store->facebook == 1) checked @endif>
                                                    <label class="form-check-label" for="facebook_yes">
                                                        نعم
                                                    </label>
                                                </div>

                                                <div class="form-check" style="display: inline-block;">
                                                    <input class="form-check-input" type="radio" name="facebook" id="facebook_no" value="0" @if($store->facebook == 0) checked @endif>
                                                    <label class="form-check-label" for="facebook_no">
                                                        لا
                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group row col-md-6">

                                            <label class="col-md-7 custom_form_label text-primary">بيع في انستجرام</label>

                                            <div class="col-md-5" style="padding-top: 10px;">

                                                <div class="form-check" style="display: inline-block; margin-left: 22px;">
                                                    <input class="form-check-input" type="radio" name="instagram" id="instagram_yes" value="1" @if($store->instagram == 1) checked @endif>
                                                    <label class="form-check-label" for="instagram_yes">
                                                        نعم
                                                    </label>
                                                </div>

                                                <div class="form-check" style="display: inline-block;">
                                                    <input class="form-check-input" type="radio" name="instagram" id="instagram_no" value="0" @if($store->instagram == 0) checked @endif>
                                                    <label class="form-check-label" for="instagram_no">
                                                        لا
                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group row col-md-6">

                                            <label class="col-md-7 custom_form_label text-primary">بيع في منصات محيط الاخري</label>

                                            <div class="col-md-5" style="padding-top: 10px;">

                                                <div class="form-check" style="display: inline-block; margin-left: 22px;">
                                                    <input class="form-check-input" type="radio" name="others" id="others_yes" value="1" @if($store->others == 1) checked @endif>
                                                    <label class="form-check-label" for="others_yes">
                                                        نعم
                                                    </label>
                                                </div>

                                                <div class="form-check" style="display: inline-block;">
                                                    <input class="form-check-input" type="radio" name="others" id="others_no" value="0" @if($store->others == 0) checked @endif>
                                                    <label class="form-check-label" for="others_no">
                                                        لا
                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <img src="{{asset('images/'.$store->product->images[0]->name)}}" style="width: 100% !important; height: 100% !important;">
                                </div>

                            </div>

                            <div class="text-center">

                                <input type="submit" class="btn btn-primary" value="تعديل">

                                <a href="{{url('/my_products/'.Auth::user()->customer->id)}}" class="btn btn-default">رجوع</a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection