@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">طلباتي</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        طلباتي
                    </div>

                    <div class="panel-body">

                        @if(count($orders) > 0)

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">إسم المنتج</th>
                                        <th class="text-center">التصنيف</th>
                                        <th class="text-center">المبلغ</th>
                                        <th class="text-center">الحالة</th>
                                        <th class="text-center">التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $row)

                                        <td>{{$row->product->title}}</td>
                                        <td>{{$row->product->category}}</td>
                                        <td>{{$row->price}}</td>
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

                                        <td><a href="{{route('customers_orders.show', ['id' => $row->id])}}" class="btn btn-success">عرض التفاصيل</a></td>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            @else

                            <h1>لا توجد لديك طلبات</h1>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

{{--
<script>

    function remove(name, url){

        if(confirm('هل تريد حذف '+ name)){

            window.location.href = url;

        }

    }

</script>--}}
