@extends('layout.app')

@push('styles')
    <link href="{{asset('them_css/rtl/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/rtl/bootstrap.rtl.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/plugins/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/rtl/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/rtl/custom.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/plugins/morris.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/font-awesome/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('master')

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        @include('admin.layout.header')

        @include('admin.layout.sidebar')

    </nav>

    @yield('content')

@endsection

@push('scripts')
    <script src="{{asset('them_js/jquery-1.11.0.js')}}"></script>
    <script src="{{asset('them_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('them_js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('them_js/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('them_js/morris/morris.min.js')}}"></script>
    <script src="{{asset('them_js/sb-admin-2.js')}}"></script>
@endpush