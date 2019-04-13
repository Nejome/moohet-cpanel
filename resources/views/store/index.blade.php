@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">منتجاتي</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        منتجاتي
                    </div>

                    <div class="panel-body">

                        @if(count($products) > 0)

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">إسم المنتج</th>
                                        <th class="text-center">تاريخ دخول المخزن</th>
                                        <th class="text-center">الكمية الاصلية</th>
                                        <th class="text-center">الكمية المتبقية</th>
                                        <th class="text-center">التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $row)

                                        <td>{{$row->product->title}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{$row->customer_order->amount_value}} {{$row->product->less_amount_text}}</td>
                                        <td>{{$row->amount}} {{$row->product->less_amount_text}}</td>
                                        <td><a href="{{url('/store/my_products/'.$row->id.'/show')}}" class="text-primary">التفاصيل</a></td>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @else

                            <h1>لا توجد لديك منتجات بمخازن محيط</h1>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
