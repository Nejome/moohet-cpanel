@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">منتجاتي</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
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
                                        <th class="text-center">الكمية</th>
                                        <th class="text-center">سعر البيع</th>
                                        <th class="text-center">بيع في فيس بوك</th>
                                        <th class="text-center">بيع في انستجرام</th>
                                        <th class="text-center">بيع في منصات محيط الاخري</th>
                                        <th class="text-center">العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $row)

                                        <tr>

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

                        @else

                            <h1>لا توجد لديك منتجات بمخازن محيط</h1>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
