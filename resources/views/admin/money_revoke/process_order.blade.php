@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> طلبات سحب الرصيد</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">


                <form method="POST" action="{{url('/admin/money_revoke/'.$order->id.'/store_revoke_operation')}}" role="form">

                    {{csrf_field()}}

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            تفاصيل الحوالة
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="form-group col-md-6 row">
                                    <label class="col-md-3 text-left">اسم العميل</label>
                                    <label class="col-md-8 text-primary">{{$order->customer->name}}</label>
                                </div>

                                <div class="form-group col-md-6 row">
                                    <label class="col-md-3 text-left">المبلغ</label>
                                    <label class="col-md-8 text-primary">{{$order->amount}} ريال سعودي</label>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6 row">
                                    <label class="col-md-3 text-left">البنك</label>
                                    <label class="col-md-8 text-primary">{{$order->bank}}</label>
                                </div>

                                <div class="form-group col-md-6 row">
                                    <label class="col-md-3 text-left">الفرع</label>
                                    <label class="col-md-8 text-primary">{{$order->branch}}</label>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6 row">
                                    <label class="col-md-3 text-left">رقم الحساب</label>
                                    <label class="col-md-8 text-primary">{{$order->account_number}}</label>
                                </div>

                                <div class="form-group col-md-6 row">
                                    <label class="col-md-3 text-left">الملاحظات</label>
                                    <label class="col-md-8 text-primary">{{$order->notes}}</label>
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="form-group col-md-6 row">
                                    <label for="" class="col-md-3 text-left custom_form_label">رقم حساب المرسل</label>
                                    <input type="text" name="sender_account_number" class="form-control col-md-8" placeholder="ادخل رقم الحساب الذي قمت بالتحويل منه">
                                    <span class="text-danger col-md-12 text-center">{{$errors->first('sender_account_number')}}</span>
                                </div>

                                <div class="form-group col-md-6 row">
                                    <label for="" class="col-md-3 text-left custom_form_label">رقم الحوالة</label>
                                    <input type="text" name="transaction_id" class="form-control col-md-8" placeholder="ادخل رقم الحوالة">
                                    <span class="text-danger col-md-12 text-center">{{$errors->first('transaction_id')}}</span>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6 row">
                                    <label for="" class="col-md-3 text-left custom_form_label">تاريخ الحوالة</label>
                                    <input type="date" name="transaction_date" class="form-control col-md-8" placeholder="ادخل تاريخ الحوالة">
                                    <span class="text-danger col-md-12 text-center">{{$errors->first('transaction_date')}}</span>
                                </div>

                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="ارسال">
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection