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
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <h3 class="mb-0">قائمة منتجاتي</h3>

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th class="font-weight-700" scope="col">المنتج</th>
                                <th class="font-weight-700" scope="col">الكمية</th>
                                <th class="font-weight-700" scope="col">سعر البيع</th>
                                <th class="font-weight-700" scope="col">بيع في فيس بوك</th>
                                <th class="font-weight-700" scope="col">بيع في انستجرام</th>
                                <th class="font-weight-700" scope="col">بيع في منصات محيط الاخري</th>
                                <th class="font-weight-700" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $row)

                                <tr class="text-center">

                                    <td>{{$row->product->name}}</td>

                                    <td>{{$row->amount}}{{$row->product->less_amount_text}}</td>

                                    <td>{{$row->selling_price}}ريال سعودي</td>

                                    <td>
                                        @if($row->facebook == 1) <span class="text-success">نعم</span> @elseif($row->facebook == 0) <span class="text-danger">لا</span> @endif
                                    </td>

                                    <td>
                                        @if($row->instagram == 1) <span class="text-success">نعم</span> @elseif($row->facebook == 0) <span class="text-danger">لا</span> @endif
                                    </td>

                                    <td>
                                        @if($row->others == 1) <span class="text-success">نعم</span> @elseif($row->facebook == 0) <span class="text-danger">لا</span> @endif
                                    </td>

                                    <td>
                                        <a href="{{url('/my_products/'.$row->id.'/show')}}" class="text-primary">التفاصيل</a>
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

@endsection

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush