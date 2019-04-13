@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">قائمة المنتجات المحذوفة</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-centered">

                <a href="{{route('products.index')}}" class="btn btn btn-primary add_button">رجوع لقائمة المنتجات</a>

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        قائمة المنتجات المحذوفة
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">إسم المنتج</th>
                                    <th class="text-center">التصنيف</th>
                                    <th class="text-center">البائع</th>
                                    <th class="text-center">السعر</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)

                                    <tr>
                                        <td class="text-center text-danger">{{$product->name}}</td>
                                        <td class="text-center">{{$product->sub_category->parent_category->title}} - {{$product->sub_category->title}}</td>
                                        <td class="text-center">{{$product->company}}</td>
                                        <td class="text-center">{{$product->price}} ريال سعودي</td>
                                        <td class="text-center"><a onclick="recovery('{{$product->name}}', '{{url('/admin/products/trash/'.$product->id.'/recovery')}}')" href="#" class="text-primary" style="text-decoration: underline;">استعادة</a></td>
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


<script>

    function recovery(name, url){

        if(confirm('هل تريد استعادة '+ name)){

            window.location.href = url;

        }

    }

</script>