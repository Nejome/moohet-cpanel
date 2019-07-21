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
                                <h3 class="mb-0">تعديل بيانات الطلب</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" style="padding-top: 0.5rem;">
                        <div class="row">
                            <div class="col-md-12">

                                @if(session()->has('not_allowed')) <div class="alert alert-warning mb-0 mt-1">{{session()->get('not_allowed')}}</div> @endif
                                @if(session()->has('out_of_balance')) <div class="alert alert-danger mb-0 mt-1">{{session()->get('out_of_balance')}}</div> @endif


                                <form method="POST" action="{{url('/revoke_orders/'.$order->id.'/update')}}">

                                    {{csrf_field()}}

                                    <div class="card-body">

                                        <div class="pl-lg-4">

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-username">المبلغ</label>
                                                        <input type="text" name="amount" value="{{$order->amount}}"  id="input-username" class="form-control form-control-alternative">
                                                        <span class="text-danger">{{$errors->first('amount')}}</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-email">رقم الحساب</label>
                                                        <input type="text" name="account_number" value="{{$order->account_number}}"  id="input-email" class="form-control form-control-alternative">
                                                        <span class="text-danger">{{$errors->first('account_number')}}</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-first-name">البنك</label>
                                                        <input type="text" name="bank" value="{{$order->bank}}"  id="input-first-name" class="form-control form-control-alternative">
                                                        <span class="text-danger">{{$errors->first('bank')}}</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-last-name">الفرع</label>
                                                        <input type="text" name="branch" value="{{$order->branch}}"  id="input-last-name" class="form-control form-control-alternative">
                                                        <span class="text-danger">{{$errors->first('branch')}}</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label">الملاحظات (اختياري)</label>
                                                        <textarea class="form-control" name="notes" rows="5">
                                                            {{$order->notes}}
                                                        </textarea>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>


                                    </div>

                                    <div class="card-footer">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-warning">تعديل</button>
                                        </div>
                                    </div>

                                </form>
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