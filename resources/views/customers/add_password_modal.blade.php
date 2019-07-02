<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-header bg-transparent">
                        <div class="text-muted text-center"><small>اضافة كلمة المرور</small></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                        <form method="POST" action="{{url('customers/'.$row->id.'/change_password_store')}}" role="form">

                            {{csrf_field()}}

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
                                <button type="submit" class="btn btn-success my-4">اضافة</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>