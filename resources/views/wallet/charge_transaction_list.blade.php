@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">قائمة معاملات الشحن</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        قائمة معاملات الشحن
                    </div>

                    @if($errors->first('refund_reason') != '')

                        <div class="alert alert-danger">{{$errors->first('refund_reason')}}</div>

                    @endif

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">المبلغ</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">رقم الفاتورة</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($paytabs as $row)

                                    <tr>

                                        <td>{{$row->amount}} ريال سعودي</td>

                                        <td>

                                            @if($row->status == 0)
                                                <span class="text-danger">فشلت المعامله</span>
                                            @elseif($row->status == 1)
                                                <span class="text-success">تمت العميلة بنجاح</span>
                                            @elseif($row->status == 01)
                                            <span class="text-warning">المعاملة تحت المعالجة</span>
                                            @endif

                                        </td>

                                        <td>{{$row->pt_invoice_id}}</td>

                                        <td>

                                            @if($row->status == 1)

                                                <a href="#" class="text-info" data-toggle="modal" data-target="#myModal">طلب الإستعادة</a>

                                                @else

                                                -

                                            @endif

                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">إدخل سبب الإستعادة</h4>
                                                            </div>

                                                            <form method="POST" action="{{url('/my_wallet/'.$row->customer_id.'/refund_transaction/'.$row->id)}}">

                                                                {{csrf_field()}}

                                                                <div class="modal-body">

                                                                    <div class="form-group row">

                                                                        <label class="col-md-3" style="text-align: left !important; padding-top: 7px;">سبب الإستعادة</label>

                                                                        <input type="text" name="refund_reason" class="col-md-7 form-control" placeholder="أدخل سبب الإستعادة">

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                                                                    <input type="submit" class="btn btn-primary" value="تعديل">
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

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

    </div>

@endsection