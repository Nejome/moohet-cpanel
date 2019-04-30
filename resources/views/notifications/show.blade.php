@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">الإشعارات</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        تفاصيل الإشعار
                    </div>
                    <div class="panel-body">

                        <p style="margin: 10px auto;">
                            {{$notification->body}}
                        </p>

                        <hr>

                        <div class="row">

                            <div class="col-md-4 text-center">

                                <address>
                                    <strong>تاريخ الإشعار</strong>
                                    <br>
                                    {{$notification->created_at->toDayDateTimeString()}}
                                </address>

                            </div>

                        </div>

                    </div>

                    <div class="panel-footer text-center">
                        <a href="{{route('notifications.index')}}" class="btn btn-default">رجوع</a>
                        <form method="POST" style="display: inline;" action="{{route('notifications.destroy', ['notification' => $notification->id])}}">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button type="submit"class="btn btn-danger">حذف</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection