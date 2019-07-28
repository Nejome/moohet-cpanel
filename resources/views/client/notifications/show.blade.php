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
                    <div class="card-header">
                        <h3 class="mb-0">{{$notification->title}}</h3>
                    </div>

                    <div class="card-body">

                        {{$notification->body}}

                        <p class="text-left mt-3 text-light">{{$notification->created_at->toDayDateTimeString()}}</p>

                    </div>

                    <div class="card-footer text-center">
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

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush