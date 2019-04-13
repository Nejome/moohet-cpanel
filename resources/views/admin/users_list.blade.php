@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">إدارة المدراء</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-centered">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        إدارة المدراء
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-center">

                                <thead>
                                <tr>
                                    <th class="text-center">الإسم</th>
                                    <th class="text-center">البريد الإلكتروني</th>
                                    <th class="text-center">النشاط</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    <td>النجومي مبارك</td>
                                    <td>alnejome98@gmail.com</td>
                                    <td class="text-success">نشط</td>
                                    <td><a href="#"><i class="far fa-trash-alt text-danger"></i></a> &nbsp; <a href="#"><i class="fas fa-lock"></i></a></td>
                                </tr>
                                <tr>
                                    <td>عمر محمد</td>
                                    <td>omer@gmail.com</td>
                                    <td class="text-danger">مغلق</td>
                                    <td><a href="#"><i class="far fa-trash-alt text-danger"></i></a> &nbsp; <a href="#"><i class="fas fa-lock-open text-success"></i></a></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection