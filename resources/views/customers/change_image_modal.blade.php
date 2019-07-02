<div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-header bg-transparent">
                        <div class="text-muted text-center"><small>تعديل الصورة الشخصية</small></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                        <form method="POST" action="{{url('/customers/'.$row->id.'/change_image')}}" role="form" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <input id="image" class="form-control" type="file" name="image">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">تعديل</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>