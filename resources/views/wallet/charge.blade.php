@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">شحن الرصيد</h1>
            </div>
        </div>


        <div class="col-lg-9 col-centered">

            <div class="panel panel-default">

                <div class="panel-heading">

                    شحن الرصيد

                </div>

                <div class="panel-body row" style="padding: 40px;">

                    <form method="POST" action="{{url('/my_wallet/'.Auth::user()->customer->id.'/charge_transaction')}}" role="form" class="col-md-10">

                        {{csrf_field()}}

                        <div class="form-group row">

                            @if(session()->has('error_complete_your_data'))

                                <div class="alert alert-danger">{{session()->get('error_complete_your_data')}}</div>

                            @endif

                            @if(session()->has('complete_data_msg'))

                                <div class="alert alert-warning">{{session()->get('complete_data_msg')}}</div>

                            @endif

                            @if(session()->has('some_error'))

                                <div class="alert alert-danger">{{session()->get('some_error')}}</div>

                            @endif

                            @if(session()->has('after_error'))

                                <div class="alert alert-danger">{{session()->get('after_error')}}</div>

                            @endif

                            @if(session()->has('will_review_msg'))

                                <div class="alert alert-info">{{session()->get('will_review_msg')}}</div>

                            @endif

                            @if(session()->has('transaction_complete'))

                                <div class="alert alert-info">{{session()->get('transaction_complete')}}</div>

                            @endif

                            <label class="col-md-3 custom_form_label">المبلغ</label>
                            <input name="amount" type="text" class="form-control col-md-8" placeholder="أدخل المبلغ المراد شحنه">

                            <span class="text-danger text-center col-md-12">{{$errors->first('err_message')}}</span>

                        </div>

                        <div class="form-group row">

                            <label class="col-md-3 custom_form_label">الرمز البريدي</label>
                            <input name="postal_code" type="text" class="form-control col-md-8" placeholder="أدخل الرمز البريدي لمنطقتك">

                            <span class="text-danger text-center col-md-12">{{$errors->first('postal_code')}}</span>

                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn btn-primary">إرسال</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


    </div>

@endsection