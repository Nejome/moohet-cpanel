@extends('client.layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')

    <!-- Page content -->
    <div class="container-fluid mt--8">

        <div class="row">
            <div class="col-xl-10 m-auto">
                <div class="card bg-secondary shadow mb-5">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تفاصيل المنتج</h3>
                            </div>
                        </div>
                        @if(session()->has('edit_success')) <div class="alert alert-success mt-2"> {{session()->get('edit_success')}} </div> @endif
                    </div>

                    <form method="POST" action="{{url('/my_products/'.$store->id.'/edit')}}">

                        {{csrf_field()}}

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label">الكمية</label>
                                                    <div class="mt-3 text-info">{{$store->amount}} {{$store->product->less_amount_text}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">سعر البيع/ريال</label>
                                                    <input type="text" name="selling_price" class="form-control form-control-alternative" value="{{$store->selling_price}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">منصات البيع</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">فيس بوك</label>
                                                    <select name="facebook"  class="form-control form-control-alternative">
                                                        <option value="1" @if($store->facebook == 1) selected @endif>نعم</option>
                                                        <option value="0" @if($store->facebook == 0) selected @endif>لا</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-country">انستجرام</label>
                                                    <select name="instagram" class="form-control form-control-alternative">
                                                        <option value="1" @if($store->instagram == 1) selected @endif>نعم</option>
                                                        <option value="0" @if($store->instagram == 0) selected @endif>لا</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">اخرى</label>
                                                    <select name="others" class="form-control form-control-alternative">
                                                        <option value="1" @if($store->others == 1) selected @endif>نعم</option>
                                                        <option value="0" @if($store->others == 0) selected @endif>لا</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <img src="{{asset('images/products/'.$store->product->images[0]->name)}}" style="width: 100% !important; height: 100% !important;">
                                </div>

                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="حفظ">
                            <a href="{{url('/my_products/'.Auth::user()->customer->id)}}" class="btn btn-secondary">رجوع</a>
                        </div>

                    </form>

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