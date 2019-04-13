@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">معاملات شحن الرصيد</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-centered">

                <div class="row text-center">

                    <a href="{{url('/admin/financial/charge_operations')}}" class="btn btn-primary">عرض كل المعاملات</a>

                    <a href="{{url('/admin/financial/charge_operations/1')}}" class="btn btn-success">عرض المعاملات الناجحه</a>

                    <a href="{{url('/admin/financial/charge_operations/01')}}" class="btn btn-warning">عرض قيد الانتظار</a>

                    <a href="{{url('/admin/financial/charge_operations/0')}}" class="btn btn-danger">عرض المعاملات الفاشلة</a>

                </div>

                <br>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        معاملات شحن الرصيد
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">إسم العميل</th>
                                    <th class="text-center">المبلغ</th>
                                    <th class="text-center">رقم الفاتورة</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">النتيجه</th>
                                    <th class="text-center">تاريخ العملية</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($operations as $row)

                                    <tr>

                                        <td><a href="{{url('/admin/financial/charge_operations_of/'.$row->customer->id)}}">{{$row->customer->name}}</a></td>

                                        <td>{{$row->amount}} ريال</td>

                                        <td>{{$row->pt_invoice_id}}</td>

                                        <td>

                                            @if($row->status === '1')

                                                <span class="text-success">تمت العلمية بنجاح</span>

                                            @elseif($row->status === '01')

                                                <span class="text-primary">في انتظار المعالجه</span>

                                            @else

                                                <span class="text-danger">فشلت العملية</span>

                                            @endif

                                        </td>

                                        <td>{{$row->result}}</td>

                                        <td>{{$row->created_at->toDayDateTimeString()}}</td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

