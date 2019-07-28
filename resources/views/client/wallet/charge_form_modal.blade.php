<div class="modal fade" id="charge_form_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-header bg-transparent">
                        <div class="text-muted text-center"><small>شحن رصيد</small></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                        <form method="POST" action="{{url('/my_wallet/'.Auth::user()->customer->id.'/charge_transaction')}}" role="form">

                            {{csrf_field()}}

                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave-alt"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="amount" placeholder="المبلغ">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="postal_code" placeholder="الرمز البريدي">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">ارسال</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>