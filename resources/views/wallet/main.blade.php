@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">محفظتي</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-centered text-center">
                                <div class="huge">{{number_format($wallet->purchases_total, 2)}}</div>
                                <div>ريال سعودي</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <span>مجموع المشتريات</span>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-centered text-center">
                                <div class="huge">{{number_format($wallet->sales_total, 2)}}</div>
                                <div>ريال سعودي</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <span>مجموع المبيعات</span>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-centered text-center">
                                <div class="huge">{{number_format($wallet->current_balance, 2)}}</div>
                                <div>ريال سعودي</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <span>الرصيد الحالي</span>
                    </div>
                </div>
            </div>

        </div>

        <hr>


        <div class="row">

            <div class="col-lg-12 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        عمليات الشراء
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">

                                <thead>
                                <tr>
                                    <th class="text-center">إسم المنتج</th>
                                    <th class="text-center">نوع الدفع</th>
                                    <th class="text-center">قيمة المنتج</th>
                                    <th class="text-center">الكمية</th>
                                    <th class="text-center">المجموع</th>
                                    <th class="text-center">تاريخ العملية</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($orders as $row)

                                    <tr>

                                        <td>{{$row->order->product->name}}</td>

                                        <td>
                                            @if($row->payment_type == 0)
                                                دفع من محفظتي
                                            @elseif($row->payment_type == 1)
                                                 دفع جديد
                                            @endif
                                        </td>

                                        <td>{{$row->order->product->price}} ريال سعودي</td>

                                        <td>{{$row->amount}}</td>

                                        <td>{{$row->total}} ريال سعودي</td>

                                        <td>{{$row->created_at->toDayDateTimeString()}}</td>

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