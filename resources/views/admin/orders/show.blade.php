@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">تفاصيل الطلبيه</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-10 col-centered row">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        تفاصيل الطلبية

                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-7">

                                <h1>{{$order->product->name}}</h1>


                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">الحالة</label>

                                        <label class="col-md-9" style="padding-top: 12px;">

                                            @if($order->status == 0)

                                                إنتظار اكتمال الكمية

                                            @elseif($order->status == 1)

                                                مرحلة الشراء

                                            @elseif($order->status ==2)

                                                مرحلة النقل

                                            @elseif($order->status == 3)

                                                وصل الطلب

                                            @endif

                                        </label>

                                    </div>

                                    @if($order->status == 0)

                                        <div class="form-group row col-md-6">

                                            <label class="col-md-6 custom_form_label text-primary">اخر تاريخ للإنتظار</label>

                                            <label class="col-md-6" style="padding-top: 12px;">

                                                {{$order->end_date}}

                                            </label>

                                        </div>

                                    @endif

                                </div>


                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">البائع</label>

                                        <label class="col-md-9" style="padding-top: 12px;">{{$order->product->company}}</label>

                                    </div>

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-6 custom_form_label text-primary">زمن الوصول</label>

                                        <label class="col-md-6" style="padding-top: 12px;">{{$order->arrival_date}}</label>

                                    </div>

                                </div>


                                <div class="row">

                                    <div class="form-group row col-md-6">

                                        <label class="col-md-3 custom_form_label text-primary">الكمية</label>

                                        <label class="col-md-9" style="padding-top: 12px;">{{$order->current_amount}} {{$order->product->less_amount_text}}</label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <img src="{{asset('images/'.$order->product->images[0]->name)}}" style="width: 100% !important; height: 100% !important;">
                            </div>

                        </div>

                        <div class="row">

                            {{--<div class="text-center col-md-4">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                    تعديل حالة الطلبيه
                                </button>
                            </div>--}}

                            <div class="text-center col-md-4">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#endDateModal">
                                    تعديل اخر تاريخ للإنتظار
                                </button>
                            </div>


                            <div class="text-center col-md-4">
                                <button class="btn btn-success" data-toggle="modal" data-target="#arrivalDateModal">
                                    تعديل زمن الوصول
                                </button>
                            </div>

                        </div>

                        {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">تعديل حالة الطبيه</h4>
                                    </div>

                                    <form method="POST" action="{{url('/admin/orders/'.$order->id.'/change_status')}}">

                                        {{csrf_field()}}

                                        <div class="modal-body">

                                            <div class="form-group row">

                                                <div class="alert alert-danger" style="margin: 20px 10px;">* إنتبه ، عند تغير حالة الطلبية الي حالة وصل الطلب لن يكون بإمكانك تعديل حالة الطلبية بعد ذلك</div>

                                                <label class="col-md-3" style="text-align: left !important; padding-top: 7px;">تغيير الحالة الي</label>

                                                <select name="status" class="col-md-7 form-control">
                                                    <option value="0" @if($order->status == 0) selected @endif>إنتظار اكتمال الكمية</option>
                                                    <option value="1" @if($order->status == 1) selected @endif>مرحلة الشراء</option>
                                                    <option value="2" @if($order->status == 2) selected @endif>مرحلة النقل</option>
                                                    <option value="3" @if($order->status == 3) selected @endif>وصل الطلب</option>
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

                        </div>--}}

                        <div class="modal fade" id="endDateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">تعديل اخر تاريخ للإنتظار</h4>
                                    </div>

                                    <form method="POST" action="{{url('/admin/orders/'.$order->id.'/change_status')}}">

                                        {{csrf_field()}}

                                        <div class="modal-body">

                                            <div class="form-group row">

                                                <label class="col-md-4" style="text-align: left !important; padding-top: 7px;">تعديل اخر تاريخ للإنتظار الي</label>

                                                <input name="end_date" type="date" value="{{$order->end_date}}" class="form-control col-md-6">

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

                        <div class="modal fade" id="arrivalDateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">تعديل تاريخ الوصول</h4>
                                    </div>

                                    <form method="POST" action="{{url('/admin/orders/'.$order->id.'/change_status')}}">

                                        {{csrf_field()}}

                                        <div class="modal-body">

                                            <div class="form-group row">

                                                <label class="col-md-4" style="text-align: left !important; padding-top: 7px;">تعديل تاريخ الوصول الي</label>

                                                <input name="arrival_date" value="{{$order->arrival_date}}" type="date" class="form-control col-md-6">

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

                        <hr>

                        <div class="col-md-10 col-centered text-center">

                            <h3 class="text-primary">أصحاب الطلبيه</h3>

                        </div>

                        <div class="col-lg-10 col-centered">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    أصحاب الطلبيه
                                </div>

                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th class="text-center">إسم العميل</th>
                                                <th class="text-center">الكمية</th>
                                                <th class="text-center">نوع التسليم</th>
                                                <th class="text-center">المبلغ المدفوع</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($order->customers_orders as $row)

                                                <tr>

                                                    <td>{{$row->customer->name}}</td>
                                                    <td>{{$row->amount}}{{$row->order->product->less_amount_text}}</td>
                                                    <td>

                                                        @if($row->arrival_type == 1)

                                                            الي المنزل

                                                        @elseif($row->arrival_type == 2)

                                                            الي مخازن محيط

                                                        @endif

                                                    </td>
                                                    <td>{{$row->total}} ريال سعودي </td>

                                                </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="panel-footer">

                        <div class="text-center">

                            <a href="{{route('orders.index')}}" class="btn btn-success">رجوع</a>

                        </div>

                    </div>

                    </div>

                </div>

        </div>

    </div>

@endsection