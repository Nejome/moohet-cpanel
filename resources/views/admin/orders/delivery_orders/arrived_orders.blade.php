@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">الطلبيات التي تم وصولها</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        الطلبيات التي تم وصولها
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">إسم المنتج</th>
                                    <th class="text-center">الكمية</th>
                                    <th class="text-center">البائع</th>
                                    <th class="text-center">تاريخ الوصول</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $order)

                                    <tr>
                                        <td class="text-center">{{$order->product->name}}</td>
                                        <td class="text-center">{{$order->current_amount}}{{$order->product->less_amount_text}}</td>
                                        <td class="text-center">{{$order->product->company}}</td>
                                        <td class="text-center">{{$order->arrival_date}}</td>
                                        <td class="text-center"><a href="{{url('/admin/orders/arrived_orders_customers/'.$order->id)}}" class="text-primary">عرض اصحاب الطلبية</a></td>
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

