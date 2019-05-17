@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">اصحاب الطلبية</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">

                @if(session()->has('arrived_success'))
                    <div class="alert alert-info">{{session()->get('arrived_success')}}</div>
                @endif

                @if(session()->has('added_success'))
                    <div class="alert alert-info">{{session()->get('added_success')}}</div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        اصحاب الطلبية
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
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order->customers_orders as $row)

                                    <tr>
                                        <td class="text-center">{{$row->customer->name}}</td>
                                        <td class="text-center">{{$row->amount}}{{$row->order->product->less_amount_text}}</td>
                                        <td>

                                            @if($row->arrival_type == 1)

                                                الي المنزل

                                            @elseif($row->arrival_type == 2)

                                                الي مخازن محيط

                                            @endif

                                        </td>
                                        <td class="text-center">{{$row->total}} ريال سعودي</td>

                                        <td class="text-center">

                                            @if($row->position == 1)

                                                <span class="text-success">اكتمل العمل علي الطلبية</span>

                                            @else

                                                @if($row->arrival_type == 1)

                                                    <a href="{{url('/admin/customers_orders/'.$row->id.'/set_arrived')}}" class="text-primary">تم التوصيل</a>

                                                @elseif($row->arrival_type == 2)

                                                    <a href="{{url('/admin/customers_orders/'.$row->id.'/add_to_store')}}" class="text-primary">اضافة منتجات العميل الي مخازن محيط</a>

                                                @endif

                                            @endif

                                        </td>
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

