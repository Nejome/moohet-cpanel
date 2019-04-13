@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تفاصيل المنتج</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-10 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تفاصيل المنتج

                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-7">

                                <h1>{{$store->product->title}}</h1>

                                <p class="">

                                    {{$store->product->information}}

                                </p>


                                <div class="row">

                                    <div class="form-group row col-md-8">

                                        <label class="col-md-6 custom_form_label text-primary">تاريخ دخول المخزن</label>

                                        <label class="col-md-6" style="padding-top: 12px;">{{$store->created_at}}</label>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-5 custom_form_label text-primary">الكمية الاصلية</label>

                                        <label class="col-md-7" style="padding-top: 12px;">{{$store->customer_order->amount_value}} {{$store->product->less_amount_text}}</label>

                                    </div>

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-5 custom_form_label text-primary">الكمية المتبقية</label>

                                        <label class="col-md-7" style="padding-top: 12px;">{{$store->amount}} {{$store->product->less_amount_text}}</label>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-5 custom_form_label text-primary">الحالة</label>

                                        <label class="col-md-7" style="padding-top: 12px;">

                                            @if($store->status == 0)

                                                غير قابل للبيع

                                            @elseif($store->status == 1)

                                                قابل للبيع

                                            @endif

                                        </label>

                                    </div>

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-5 custom_form_label text-primary">السعر</label>

                                        <label class="col-md-7" style="padding-top: 12px;">{{$store->product->price}} ريال</label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <img src="{{asset('images/'.$store->product->image)}}" style="width: 100% !important; height: 100% !important;">
                            </div>

                        </div>

                        <div class="text-center">

                            <a href="{{route('customers_orders.index')}}" class="btn btn-success">رجوع</a>

                            <button class="btn btn-warning" data-toggle="modal" data-target="#statusModal">
                                تعديل حالة المنتج
                            </button>

                        </div>

                        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">تعديل حالة المنتج</h4>
                                    </div>

                                    <form method="POST" action="{{url('/store/my_products/'.$store->id.'/change_status')}}">

                                        {{csrf_field()}}

                                        <div class="modal-body">

                                            <div class="form-group row">

                                                <label class="col-md-4" style="text-align: left !important; padding-top: 7px;">تعديل حالة المنتج الي</label>

                                                <select class="form-control col-md-6" name="status">
                                                    <option value="0" @if($store->status == 0) selected @endif>غير قابل للبيع</option>
                                                    <option value="1" @if($store->status == 1) selected @endif>قابل للبيع</option>
                                                </select>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                                            <input type="submit" type="button" class="btn btn-primary" value="تعديل">
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection