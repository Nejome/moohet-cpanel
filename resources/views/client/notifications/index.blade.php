@extends('client.layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')

    <!-- Page content -->
    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <h3 class="mb-0">قائمة الإشعارات</h3>

                        @if(session()->has('delete_msg'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-inner--text">{{session()->get('delete_msg')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col"></th>
                                <th class="font-weight-700" scope="col">العنوان</th>
                                <th class="font-weight-700" scope="col">زمن الإشعار</th>
                                <th class="font-weight-700" scope="col">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($notifications as $row)
                                <tr class="text-center info">
                                    <td>@if($row->showed == 0) <span class="text-danger"><i class="fas fa-bell"></i></span> @endif</td>
                                    <td><a href="{{route('notifications.show', ['notification' => $row->id])}}">{{$row->title}}</a></td>
                                    <td>{{$row->created_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary " href="{{route('notifications.show', ['notification' => $row->id])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        |
                                        <form method="POST" style="display: inline;" action="{{route('notifications.destroy', ['notification' => $row->id])}}">
                                            {{csrf_field()}}
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger "><i class="fas fa-trash-alt"></i></button>
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

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush