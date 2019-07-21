@extends('layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')

    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">لوحة التحكم</a>

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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8 mb-5">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">

                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">مجموع مشترياتي</h5>
                                        <span class="h2 font-weight-bold mb-0">{{number_format($wallet->purchases_total, 2)}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-cyan text-white rounded-circle shadow">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">مجموع مبيعاتي</h5>
                                        <span class="h2 font-weight-bold mb-0">{{number_format($wallet->sales_total, 2)}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-store-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6">
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

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">معاملات سحب الرصيد</h3>
                            </div>
                        </div>

                        @if(session()->has('order_created')) <div class="alert alert-success mb-0 mt-1">{{session()->get('order_created')}}</div> @endif
                        @if(session()->has('updated_success')) <div class="alert alert-success mb-0 mt-1">{{session()->get('updated_success')}}</div> @endif
                        @if(session()->has('sent_to_trash')) <div class="alert alert-success mb-0 mt-1">{{session()->get('sent_to_trash')}}</div> @endif

                    </div>
                    <div class="card-body" style="padding-top: 0.5rem;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div id="nav-pills-tabs-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="nav-pills-tabs-component-tab">
                                        <div class="nav-wrapper">
                                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                                        <i class="fas fa-plus m-1"></i>إنشاء طلب جديد
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                                        <i class="fas fa-clipboard-list m-1"></i>الطلبات الحالية
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                                        <i class="fas fa-clipboard-check m-1"></i>الطلبات المكتملة
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="card shadow">
                                            <div class="card-body">

                                                <div class="tab-content" id="myTabContent">

                                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                                                        @if(session()->has('not_allowed')) <div class="alert alert-warning">{{session()->get('not_allowed')}}</div> @endif
                                                        @if(session()->has('out_of_balance')) <div class="alert alert-danger">{{session()->get('out_of_balance')}}</div> @endif

                                                        <form method="POST" action="{{url('/revoke_orders/store')}}">

                                                            {{csrf_field()}}

                                                            <div class="card-body">

                                                                <div class="pl-lg-4">

                                                                    <div class="row">

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group focused">
                                                                                <label class="form-control-label" for="input-username">المبلغ</label>
                                                                                <input type="text" name="amount"  id="input-username" class="form-control form-control-alternative" placeholder="المبلغ">
                                                                                <span class="text-danger">{{$errors->first('amount')}}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group focused">
                                                                                <label class="form-control-label" for="input-email">رقم الحساب</label>
                                                                                <input type="text" name="account_number"  id="input-email" class="form-control form-control-alternative" placeholder="رقم الحساب">
                                                                                <span class="text-danger">{{$errors->first('account_number')}}</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group focused">
                                                                                <label class="form-control-label" for="input-first-name">البنك</label>
                                                                                <input type="text" name="bank" id="input-first-name" class="form-control form-control-alternative" placeholder="البنك">
                                                                                <span class="text-danger">{{$errors->first('bank')}}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group focused">
                                                                                <label class="form-control-label" for="input-last-name">الفرع</label>
                                                                                <input type="text" name="branch" id="input-last-name" class="form-control form-control-alternative" placeholder="الفرع">
                                                                                <span class="text-danger">{{$errors->first('branch')}}</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group focused">
                                                                                <label class="form-control-label">الملاحظات (اختياري)</label>
                                                                                <textarea class="form-control" name="notes" rows="5"></textarea>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>


                                                            </div>

                                                            <div class="card-footer">
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                                                </div>
                                                            </div>

                                                        </form>

                                                    </div>

                                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">

                                                        <div class="table-responsive">
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                <tr class="text-center">
                                                                    <th class="font-weight-700" scope="col">المبلغ</th>
                                                                    <th class="font-weight-700" scope="col">البنك</th>
                                                                    <th class="font-weight-700" scope="col">الفرع</th>
                                                                    <th class="font-weight-700" scope="col">رقم الحساب</th>
                                                                    <th class="font-weight-700" scope="col">ملاحظات</th>
                                                                    <th class="font-weight-700" scope="col"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($current_orders as $order)
                                                                    <tr class="text-center">

                                                                        <td>{{$order->amount}}</td>

                                                                        <td>{{$order->bank}}</td>

                                                                        <td>{{$order->branch}}</td>

                                                                        <td>{{$order->account_number}}</td>

                                                                        <td>
                                                                            @if($order->notes == null)
                                                                                لا توجد
                                                                            @else
                                                                                {{$order->notes}}
                                                                            @endif
                                                                        </td>

                                                                        <td>
                                                                            @if($order->showed == 0)

                                                                                <a href="{{url('/revoke_orders/edit?id='.$order->id)}}" class="text-warning">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </a>&nbsp;

                                                                                |

                                                                                &nbsp;<a href="{{url('/revoke_orders/'.$order->id.'/delete_from_current')}}" class="text-danger">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </a>

                                                                            @else

                                                                                -

                                                                            @endif
                                                                        </td>

                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">

                                                        <div class="table-responsive">
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                <tr class="text-center">
                                                                    <th class="font-weight-700" scope="col">المبلغ</th>
                                                                    <th class="font-weight-700" scope="col">البنك</th>
                                                                    <th class="font-weight-700" scope="col">الفرع</th>
                                                                    <th class="font-weight-700" scope="col">رقم الحساب</th>
                                                                    <th class="font-weight-700" scope="col">ملاحظاتي</th>
                                                                    <th class="font-weight-700" scope="col">رقم حساب المرسل</th>
                                                                    <th class="font-weight-700" scope="col">رقم العملية</th>
                                                                    <th class="font-weight-700" scope="col">تاريخ العميلة</th>
                                                                    <th class="font-weight-700" scope="col"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($complete_orders as $row)

                                                                    <tr>

                                                                        <td>{{$row->amount}} ريال سعودي</td>

                                                                        <td>{{$row->bank}}</td>

                                                                        <td>{{$row->branch}}</td>

                                                                        <td>{{$row->account_number}}</td>

                                                                        <td>
                                                                            @if($row->notes == null)
                                                                                لا توجد
                                                                            @else
                                                                                {{$row->notes}}
                                                                            @endif
                                                                        </td>

                                                                        <td>{{$row->revoke_operation->sender_account_number}}</td>

                                                                        <td>{{$row->revoke_operation->transaction_id}}</td>

                                                                        <td>{{$row->revoke_operation->transaction_date}}</td>

                                                                        <td>

                                                                            <a href="{{url('/revoke_orders/'.$row->id .'/delete')}}" class="text-danger">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </a>

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

                                </div>
                            </div>
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