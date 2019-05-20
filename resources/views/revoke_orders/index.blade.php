@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">سحب رصيد</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
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
                                        <th class="text-center">المبلغ</th>
                                        <th class="text-center">البنك</th>
                                        <th class="text-center">الفرع</th>
                                        <th class="text-center">رقم الحساب</th>
                                        <th class="text-center">ملاحظات</th>
                                        <th class="text-center">العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)

                                        <tr>

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
                                                <a href="#">تعديل</a>
                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @else

                            <h1>لا توجد لديك طلبات سحب رصيد حتي الان</h1>

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
