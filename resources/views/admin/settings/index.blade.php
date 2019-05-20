@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">الإعدادات</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">

                @if(session()->has('update_success'))<div class="alert alert-info">{{session()->get('update_success')}}</div>@endif

                    @if(count($errors) > 0)<div class="alert alert-danger">عفوا قم بمراجعة قيم الحقول التي ادخلتها</div>@endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        الإعدادات
                    </div>

                    <form method="POST" action="{{url('/admin/settings/update')}}">

                        {{csrf_field()}}

                        <div class="panel-body">

                            <ul class="nav nav-tabs">

                                <li class="active">
                                    <a href="#home" data-toggle="tab">الاساسية</a>
                                </li>

                                <li class="">
                                    <a href="#profile" data-toggle="tab">الوصول للموقع</a>
                                </li>

                                <li class="">
                                    <a href="#messages" data-toggle="tab">المالية</a>
                                </li>

                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade active in" id="home">

                                    @include('admin.settings.main')

                                </div>

                                <div class="tab-pane fade" id="profile">

                                    @include('admin.settings.access')

                                </div>

                                <div class="tab-pane fade" id="messages">

                                    @include('admin.settings.finance')

                                </div>

                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="حفظ">
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection