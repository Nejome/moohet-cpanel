@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">قائمة منتجات 1688</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-centered">

                {{--@if(session()->has('success_msg'))

                    <div class="alert alert-success">{{session()->get('success_msg')}}</div>

                @endif--}}

                    <a href="{{url('products')}}" class="btn btn btn-success add_button">البحث عن منتج جديد</a>

                    {{--<a href="{{url('/admin/products/trash')}}" class="btn btn btn-danger trash_button">سلة المحذوفات</a>--}}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        قائمة المنتجات
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">إسم المنتج</th>
                                    <th class="text-center">التصنيف</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">البائع</th>
                                    <th class="text-center">السعر</th>
                                    <th class="text-center">عرض في قائمة المنتجات</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)

                                    <tr>
                                        <td class="text-center">{{$product->name}}</td>

                                        <td class="text-center">{{$product->sub_category->parent_category->title}} - {{$product->sub_category->title}}</td>

                                        <td>

                                            @if($product->active == 1)

                                                <span class="text-success">نشط</span>

                                            @else

                                                <span class="text-danger">غير نشط</span>

                                            @endif

                                        </td>

                                        <td class="text-center">{{$product->company}}</td>

                                        <td class="text-center">{{$product->price}} ريال سعودي</td>


                                        <td>

                                            @if($product->show_with_products == 1)

                                                <span class="text-success">نعم</span> |

                                                <a href="{{url('/admin/products/'.$product->id.'/change_status')}}" class="text-primary">اخفاء</a>

                                            @else

                                                <span class="text-danger">لا</span> |

                                                <a href="{{url('/admin/products/'.$product->id.'/change_status')}}" class="text-primary">عرض</a>

                                            @endif

                                        </td>

                                        <td class="text-center">
                                            <a href="{{url('/admin/products/'.$product->id.'/images')}}" class="text-success"><i class="fa fa-picture-o" aria-hidden="true"></i></a> |
                                            <a href="{{route('products.edit', ['id' => $product->id])}}" class="text-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                            <a onclick="remove('{{$product->name}}', '{{url('/admin/products/'.$product->id.'/delete')}}')" href="#" class="text-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>

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

    function remove(name, url){

       if(confirm('هل تريد حذف '+ name)){

           window.location.href = url;

       }

    }

</script>