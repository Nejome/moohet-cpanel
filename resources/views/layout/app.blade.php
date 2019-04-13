<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Lemonada" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('images/1.png')}}"/>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}" defer></script>

    <link href="{{asset('them_css/rtl/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/rtl/bootstrap.rtl.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/plugins/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/rtl/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/rtl/custom.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/plugins/morris.css')}}" rel="stylesheet">
    <link href="{{asset('them_css/font-awesome/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


</head>
<body>

<div id="app">

    <div id="wrapper">

        @yield('master')

    </div>


</div>

<script src="{{asset('them_js/jquery-1.11.0.js')}}"></script>
<script src="{{asset('them_js/bootstrap.min.js')}}"></script>
<script src="{{asset('them_js/metisMenu/metisMenu.min.js')}}"></script>
<script src="{{asset('them_js/raphael/raphael.min.js')}}"></script>
<script src="{{asset('them_js/morris/morris.min.js')}}"></script>
<script src="{{asset('them_js/sb-admin-2.js')}}"></script>

</body>
</html>
