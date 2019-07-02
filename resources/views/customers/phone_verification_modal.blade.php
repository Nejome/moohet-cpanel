<div class="modal fade" id="phone_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-header bg-transparent">
                        <div class="text-muted text-center"><small>اضافة رقم الهاتف</small></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                        <form method="POST" action="{{url('/phone_verification/generate_code/'.Auth::user()->customer->id)}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="phone" placeholder="رقم الهاتف">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mt-1" style="width: 100%;">اضافة</button>
                            </div>
                        </form>

                        <p class="text-success font-weight-500">في حال تم ارسال الكود قم بإدخاله هنا</p>

                        <form method="POST" action="{{url('/phone_verification/check_code/'.Auth::user()->customer->id)}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="code" placeholder="كود التحقق">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm mt-1" style="width: 100%;">تحقق</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>