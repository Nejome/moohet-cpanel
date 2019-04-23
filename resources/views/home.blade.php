@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">لوحة التحكم</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-centered text-center">
                                <div class="huge">{{$orders_count}}</div>
                                <div>طلبية</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <span>مجموع طلبياتي</span>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-centered text-center">
                                <div class="huge">{{$products_count}}</div>
                                <div>منتج</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <span>مجموع منتجاتي</span>
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

    </div>

@endsection