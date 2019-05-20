@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">سحب الرصيد</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">

                @if(session()->has('not_allowed')) <div class="alert alert-warning">{{session()->get('not_allowed')}}</div> @endif
                @if(session()->has('out_of_balance')) <div class="alert alert-danger">{{session()->get('out_of_balance')}}</div> @endif

                <form method="POST" action="{{url('/revoke_orders/store')}}" role="form">

                    {{csrf_field()}}

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            انشاء طلب جديد
                        </div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="form-group col-md-6 row @if($errors->first('amount') != '') has-error @endif">
                                    <label class="col-md-3 text-left" for="amount" style="padding-top: 8px;">المبلغ</label>
                                    <input id="amount" name="amount" value="{{old('amount')}}" type="text" class="form-control col-md-8" placeholder="ادخل المبلغ">
                                    <p class="text-danger col-md-12 text-center">{{$errors->first('amount')}}</p>
                                </div>

                                <div class="form-group col-md-6 row @if($errors->first('account_number') != '') has-error @endif">
                                    <label class="col-md-3 text-left" for="account_number" style="padding-top: 8px;">رقم الحساب</label>
                                    <input id="account_number" name="account_number" value="{{old('account_number')}}" type="text" class="form-control col-md-8" placeholder="ادخل رقم الحساب">
                                    <p class="text-danger col-md-12 text-center">{{$errors->first('account_number')}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 row @if($errors->first('bank') != '') has-error @endif">
                                    <label class="col-md-3 text-left" for="bank" style="padding-top: 8px;">البنك</label>
                                    <input id="bank" name="bank" value="{{old('bank')}}" type="text" class="form-control col-md-8" placeholder="ادخل اسم البنك">
                                    <p class="text-danger col-md-12 text-center">{{$errors->first('bank')}}</p>
                                </div>

                                <div class="form-group col-md-6 row @if($errors->first('branch') != '') has-error @endif">
                                    <label class="col-md-3 text-left" for="branch" style="padding-top: 8px;">الفرع</label>
                                    <input id="branch" name="branch" value="{{old('branch')}}" type="text" class="form-control col-md-8" placeholder="ادخل اسم الفرع">
                                    <p class="text-danger col-md-12 text-center">{{$errors->first('branch')}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-centered">
                                    <label for="notes">ملاحظات (اختياري)</label>
                                    <textarea id="notes" name="notes" class="form-control" rows="7">
                                        {{old('notes')}}
                                    </textarea>
                                </div>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="طلب">
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection