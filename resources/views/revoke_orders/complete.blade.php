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

                @if(session()->has('sent_to_trash')) <div class="alert alert-danger">{{session()->get('sent_to_trash')}}</div> @endif

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
                                        <th class="text-center">رقم حسابي</th>
                                        <th class="text-center">ملاحظاتي</th>
                                        <th class="text-center">رقم حساب المرسل</th>
                                        <th class="text-center">رقم العملية</th>
                                        <th class="text-center">تاريخ العملية</th>
                                        <th class="text-center">العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)

                                        <tr>

                                            <td>{{$order->amount}} ريال سعودي</td>

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

                                            <td>{{$order->revoke_operation->sender_account_number}}</td>

                                            <td>{{$order->revoke_operation->transaction_id}}</td>

                                            <td>{{$order->revoke_operation->transaction_date}}</td>

                                            <td>

                                                <a href="{{url('/revoke_orders/'.$order->id .'/delete')}}" class="text-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @else

                            <h1>لا توجد لديك طلبات سحب رصيد مكتملة</h1>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


