@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">صور <span class="text-primary">{{$product->name}}</span></h3>
            </div>
        </div>

        <div class="row">
            <div clsss="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        صور المنتج
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            @foreach($product->images as $image)

                                <div class="col-md-3">

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <img src="{{$image->url}}" width="100%" style="height: 250px;">
                                        </div>
                                        <div class="panel-footer text-center">
                                            <a href="{{url('/admin/images/'.$image->id.'/delete')}}" class="btn btn-danger">حذف</a>
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                    <div class="panel-footer text-center">
                        <a href="{{url('/admin/products/'.$product->id.'/reset_images')}}" class="btn btn-warning">استعادة الصور الافتراضيه</a>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#uploadImageModal">تحميل صورة جديده</a>

                        @if($product->show_with_products == 1)
                            <a href="{{route('products.index')}}" class="btn btn-default">رجوع</a>
                        @else
                            <a href="{{url('/admin/products/abb')}}" class="btn btn-default">رجوع</a>
                        @endif

                    </div>

                    <div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">تحميل صورة جديدة</h4>
                                </div>
                                <form method="POST" action="{{url('/admin/images/store/'.$product->id)}}" enctype="multipart/form-data">

                                    {{csrf_field()}}

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">اختر الصورة</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection