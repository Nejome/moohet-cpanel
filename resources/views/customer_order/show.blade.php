@extends('layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')

    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-8 mt-5 mr-auto ml-auto mb-5 mb-xl-0">
                <div class="card card-profile shadow">

                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{asset('images/products/'.$order->order->product->images[0]->name)}}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">

                        </div>
                    </div>

                    <div class="card-body pt-0 pt-md-3">

                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <h3>{{$order->order->product->name}}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col text-left">
                                        <span class="text-info">الحالة : </span>
                                    </div>
                                    <div class="col text-right">
                                        @if($order->order->status == 0)

                                            إنتظار اكتمال الكمية

                                        @elseif($order->order->status == 1)

                                            مرحلة الشراء

                                        @elseif($order->order->status ==2)

                                            مرحلة النقل

                                        @elseif($order->order->status == 3)

                                            وصل الطلب

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col text-left">
                                        <span class="text-info">نوع الإستلام : </span>
                                    </div>
                                    <div class="col text-right">
                                        @if($order->arrival_type == 1)

                                            الي مخزني

                                        @elseif($order->arrival_type == 2)

                                            الي مخازن محيط

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col text-left">
                                        <span class="text-info">البائع : </span>
                                    </div>
                                    <div class="col text-right">
                                        {{$order->order->product->company}}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col text-left">
                                        <span class="text-info">زمن الوصول : </span>
                                    </div>
                                    <div class="col text-right">
                                        {{$order->order->arrival_date}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col text-left">
                                        <span class="text-info">الكمية : </span>
                                    </div>
                                    <div class="col text-right">
                                        {{$order->order->product->amount_value}} {{$order->order->product->less_amount_text}}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col text-left">
                                        <span class="text-info">السعر : </span>
                                    </div>
                                    <div class="col text-right">
                                        {{$order->total}} ريال
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <a href="{{route('customers_orders.index')}}" class="btn btn-secondary">رجوع</a>
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