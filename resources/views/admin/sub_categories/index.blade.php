@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ادارة التصنيفات الفرعية</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-11 col-centered">

                @if(session()->has('success_msg'))

                    <div class="alert alert-success">{{session()->get('success_msg')}}</div>

                @endif

                @if(session()->has('delete_msg'))

                    <div class="alert alert-danger">{{session()->get('delete_msg')}}</div>

                @endif

                @if(session()->has('edit_msg'))

                    <div class="alert alert-warning">{{session()->get('edit_msg')}}</div>

                @endif

                <a href="{{route('sub_categories.create')}}" class="btn btn btn-success add_button">  اضافة تصنيف فرعي جديد </a>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        قائمة التصنيفات الفرعية
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">إسم التصنيف</th>
                                    <th class="text-center">إسم الفئة الام</th>
                                    <th class="text-center">النشاط</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $row)

                                    <tr>

                                        <td>{{$row->title}}</td>

                                        <td>{{$row->parent_category->title}}</td>

                                        <td>

                                            @if($row->active == 1)

                                                <span class="text-success">نشط</span>

                                            @else

                                                <span class="text-danger">غير نشط</span>

                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{route('sub_categories.edit', ['sub_category' => $row->id])}}" class="text-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

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