@extends('layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')

    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">طلباتي</a>

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">

                                @if(isset(Auth::user()->image) && Auth::user()->image != '')

                                    <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{asset('images/'.Auth::user()->image)}}">

                                </span>

                                @else

                                    <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{asset('images/man2.png')}}">

                                </span>

                                @endif

                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->customer->name}}</span>
                                </div>

                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right text-right">

                            <a href="{{url('/customers/'.Auth::user()->customer->id.'/edit')}}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>ملفي الشخصي</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="{{url('/logout')}}" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>تسجيل الخروج</span>
                            </a>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">طلباتي</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$public_orders_count}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-cyan text-white rounded-circle shadow">
                                                <i class="fas fa-shipping-fast"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">منتجاتي</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$public_products_count}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">الإشعارات</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$new_notifications_number}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-bell"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">رصيدي الحالي</h5>
                                            <span class="h2 font-weight-bold mb-0">{{number_format($public_wallet->current_balance, 2)}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-wallet"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--7">

            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">

                            <h3 class="mb-0">قائمة طلباتي</h3>

{{--                            @if(session()->has('delete_msg'))--}}
{{--                                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                                    <span class="alert-inner--text">{{session()->get('delete_msg')}}</span>--}}
{{--                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">×</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            @endif--}}

                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr class="text-center">
                                    <th class="font-weight-700" scope="col">المنتج</th>
                                    <th class="font-weight-700" scope="col">تصنيف المنتج</th>
                                    <th class="font-weight-700" scope="col">المبلغ</th>
                                    <th class="font-weight-700" scope="col">الحالة</th>
                                    <th class="font-weight-700" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $row)

                                    <tr class="text-center">

                                        <td>{{$row->order->product->name}}</td>
                                        <td>{{$row->order->product->sub_category->title}}</td>
                                        <td>{{$row->total}} ريال سعودي</td>

                                        <td>

                                            @if($row->order->status == 0)

                                                إنتظار اكتمال الكمية

                                            @elseif($row->order->status == 1)

                                                مرحلة الشراء

                                            @elseif($row->order->status ==2)

                                                مرحلة النقل

                                            @elseif($row->order->status == 3)

                                                وصل الطلب

                                            @endif

                                        </td>

                                        <td>
                                            <a href="{{route('customers_orders.show', ['id' => $row->id])}}" class="btn btn-sm btn-primary">عرض التفاصيل</a>
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

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush