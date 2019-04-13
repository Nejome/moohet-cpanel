@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">قائمة العملاء</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        قائمة العملاء
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">الإسم</th>
                                    <th class="text-center">البريد الإلكتروني</th>
                                    <th class="text-center">المدينة</th>
                                    <th class="text-center">البلد</th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">رقم الهوية</th>
                                    <th class="text-center">اخر ظهور</th>
                                    <th class="text-center">الحالة</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $counter = 1; ?>

                                @foreach($customers as $customer)

                                    <?php

                                            $user = DB::table('users')->where('id', $customer->user_id)->get();

                                            $row = $user[0];

                                    ?>

                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$customer->country}}</td>
                                        <td>{{$customer->town}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->identification_number}}</td>
                                        <td>{{$row->last_seen}}</td>
                                        <td>

                                            @if($row->activity == 1)

                                                <a href="{{url('/admin/users/close/'.$customer->user_id)}}"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a>

                                                @else

                                                <a href="{{url('/admin/users/open/'.$customer->user_id)}}"><i class="fa fa-lock text-danger" aria-hidden="true"></i></a>

                                            @endif

                                        </td>
                                    </tr>

                                    <?php $counter ++ ?>

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