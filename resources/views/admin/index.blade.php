@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">لوحة التحكم</h1>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">{{$product_number}}</div>
                            <div>المنتجات</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('products.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">عرض التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-truck fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">{{$orders_number}}</div>
                            <div>الطلبيات</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('orders.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">عرض التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">{{$customers_number}}</div>
                            <div>العملاء</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('customers.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">عرض التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>

@endsection