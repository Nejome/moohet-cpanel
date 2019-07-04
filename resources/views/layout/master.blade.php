@extends('layout.app')

@section('master')

    @include('layout.sidebar')

    <div class="main-content">

        @include('layout.header')

        @yield('content')

    </div>

@endsection