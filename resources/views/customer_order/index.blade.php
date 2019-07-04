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

                        <h3 class="mb-0">قائمة طلباتي</h3>

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

@endsection

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush