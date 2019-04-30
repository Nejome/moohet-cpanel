@extends('layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">الإشعارات</h1>
            </div>
        </div>

        <div class="col-lg-12">

            @if(session()->has('delete_msg'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session()->get('delete_msg')}}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    الإشعارات
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">زمن الإشعار</th>
                                <th class="text-center">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($notifications as $row)

                                <tr class="text-center @if($row->showed == 0) info @endif">
                                    <td class="text-center">{{$row->id}}</td>
                                    <td class="text-center"><a style="color: black;" href="{{route('notifications.show', ['notification' => $row->id])}}">{{$row->title}}</a></td>
                                    <td class="text-center">{{$row->created_at->toDayDateTimeString()}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{route('notifications.show', ['notification' => $row->id])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        |
                                        <form method="POST" style="display: inline;" action="{{route('notifications.destroy', ['notification' => $row->id])}}">
                                            {{csrf_field()}}
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
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

@endsection