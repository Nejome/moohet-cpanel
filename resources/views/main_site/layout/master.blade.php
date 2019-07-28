@extends('app')

@push('styles')
    <link href="{{asset('main_site/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/lib/nivo-slider/css/nivo-slider.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/lib/owlcarousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/lib/owlcarousel/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/lib/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/css/nivo-slider-theme.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('main_site/css/responsive.css')}}" rel="stylesheet">
@endpush

@section('master')

    @yield('content')

@endsection

@push('scripts')
    <script src="{{asset('main_site/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('main_site/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('main_site/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('main_site/lib/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('main_site/lib/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('main_site/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('main_site/lib/parallax/parallax.js')}}"></script>
    <script src="{{asset('main_site/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('main_site/lib/nivo-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('main_site/lib/appear/jquery.appear.js')}}"></script>
    <script src="{{asset('main_site/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('main_site/contactform/contactform.js')}}"></script>
    <script src="{{asset('main_site/js/main.js')}}"></script>
@endpush
