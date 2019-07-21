@extends('layout.app')

@section('master')

    @include('layout.sidebar')

    <div class="main-content">

        @if(Request::url() != url('/my_wallet/info') && Request::url() != url('/my_wallet/charge') && Request::url() != url('/revoke_orders') && Request::url() != url('/revoke_orders/edit'))

            @include('layout.header')

        @endif

        @yield('content')

    </div>

@endsection