<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-header bg-transparent">
                        <div class="text-muted text-center"><small>تعديل كلمة المرور</small></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                        <form role="form">

                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="current_password" placeholder="كلمة المرور الحالية">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="password" placeholder="كلمة المرور الجديدة">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور الجديدة">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary my-4">تعديل</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>