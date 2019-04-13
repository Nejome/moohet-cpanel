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

                        @if(count($sales) > 0)

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover text-center">

                                    <thead>
                                    <tr>
                                        <th class="text-center">إسم المنتج</th>
                                        <th class="text-center">نوع الدفع</th>
                                        <th class="text-center">قيمة المنتج</th>
                                        <th class="text-center">تاريخ العملية</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($sales as $sale)

                                        <tr>
                                            <td>{{$sale->product->title}}</td>

                                            <td>

                                                @if($sale->payment_type == 1)

                                                    دفع مباشر

                                                @elseif($sale->payment_type == 2)

                                                    دفع من الرصيد

                                                @endif

                                            </td>

                                            <td>{{$sale->price}}</td>

                                            <td>{{$sale->created_at}}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>
                            </div>

                        @else

                            <h1>لم تقم بعمليات شراء بعد</h1>

                        @endif

                    </div>

                </div>

            </div>

        </div>


    </div>

@endsection