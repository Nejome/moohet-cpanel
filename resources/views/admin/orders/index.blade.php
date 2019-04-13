@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">قائمة الطلبيات</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        قائمة الطلبيات
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">إسم المنتج</th>
                                    <th class="text-center">الكمية</th>
                                    <th class="text-center">البائع</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">تاريخ الوصول</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $order)

                                    <tr>
                                        <td class="text-center">{{$order->product->title}}</td>
                                        <td class="text-center">{{$order->current_amount}}{{$order->product->less_amount_text}}</td>
                                        <td class="text-center">{{$order->product->seller}}</td>
                                        <td class="text-center">

                                            @if($order->status == 0)

                                                إنتظار اكتمال الكمية

                                            @elseif($order->status == 1)

                                                مرحلة الشراء

                                            @elseif($order->status ==2)

                                                مرحلة النقل

                                            @elseif($order->status == 3)

                                                وصل الطلب

                                            @endif

                                        </td>
                                        <td class="text-center">{{$order->arrival_date}}</td>
                                        <td class="text-center"><a href="{{route('orders.show', ['id' => $order->id])}}" class="btn btn-primary">عرض التفاصيل</a></td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

