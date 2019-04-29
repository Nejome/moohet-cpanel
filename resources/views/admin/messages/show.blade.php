@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">الرسائل</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        تفاصيل الرسالة
                    </div>
                    <div class="panel-body">

                        <p style="margin: 10px auto;">
                            {{$message->message_body}}
                        </p>

                        <hr>

                        <div class="row">

                            <div class="col-md-4 text-center">

                                <address>
                                    <strong>اسم المرسل</strong>
                                    <br>
                                    {{$message->sender_name}}
                                </address>

                            </div>

                            <div class="col-md-4 text-center">

                                <address>
                                    <strong>البريد الإلكتروني</strong>
                                    <br>
                                    <a href="mailto:{{$message->sender_email}}">{{$message->sender_email}}</a>
                                </address>

                            </div>

                            <div class="col-md-4 text-center">

                                <address>
                                    <strong>رقم الهاتف</strong>
                                    <br>
                                    {{$message->sender_phone}}
                                </address>

                            </div>

                        </div>

                    </div>

                    <div class="panel-footer text-center">
                        <a href="{{route('messages.index')}}" class="btn btn-default">رجوع</a>
                        <form method="POST" style="display: inline;" action="{{route('messages.destroy', ['message' => $message->id])}}">
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