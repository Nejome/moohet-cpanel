@extends('layout.app')

@section('master')

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        @include('admin.layout.header')

        @include('admin.layout.sidebar')

    </nav>

    @yield('content')

@endsection