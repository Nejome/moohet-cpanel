@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تفاصيل الطلب</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-10 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تفاصيل الطلب

                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-7">

                                <h1>{{$order->product->title}}</h1>

                                <p class="">

                                    {{$order->product->information}}

                                </p>

                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">الحالة</label>

                                        <label class="col-md-9" style="padding-top: 12px;">

                                            @if($order->order->status == 0)

                                                إنتظار اكتمال الكمية

                                            @elseif($order->order->status == 1)

                                                مرحلة الشراء

                                            @elseif($order->order->status ==2)

                                                مرحلة النقل

                                            @elseif($order->order->status == 3)

                                                وصل الطلب

                                            @endif

                                        </label>

                                    </div>

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-5 custom_form_label text-primary">نوع الإستلام</label>

                                        <label class="col-md-7" style="padding-top: 12px;">

                                            @if($order->arrival_type == 1)

                                                الي مخزني

                                                @elseif($order->arrival_type == 2)

                                                الي مخازن محيط

                                            @endif

                                        </label>

                                    </div>

                                </div>


                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">البائع</label>

                                        <label class="col-md-9" style="padding-top: 12px;">{{$order->product->seller}}</label>

                                    </div>

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-5 custom_form_label text-primary">زمن الوصول</label>

                                        <label class="col-md-7" style="padding-top: 12px;">{{$order->order->arrival_date}}</label>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">الكمية</label>

                                        <label class="col-md-9" style="padding-top: 12px;">{{$order->amount_value}} {{$order->product->less_amount_text}}</label>

                                    </div>

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">السعر</label>

                                        <label class="col-md-9" style="padding-top: 12px;">{{$order->price}} ريال</label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <img src="{{asset('images/'.$order->product->image)}}" style="width: 100% !important; height: 100% !important;">
                            </div>

                        </div>

                        <div class="text-center">

                            <a href="{{route('customers_orders.index')}}" class="btn btn-success">رجوع</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection