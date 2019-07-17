@extends('layout.app')

@section('master')

    @include('layout.sidebar')

    <div class="main-content">

        @if(Request::url() != url('/my_wallet/info'))

            @include('layout.header')

        @endif

        @yield('content')

    </div>

@endsection