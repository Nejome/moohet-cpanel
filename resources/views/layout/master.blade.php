@extends('layout.app')

@section('master')

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        @include('layout.header')

        @include('layout.sidebar')

    </nav>

    @yield('content')

@endsection