<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SAC - Transporte TDM SRL</title>

    <!-- Fontfaces CSS-->
    <link href="{{{ asset('css/font-face.css') }}}" rel="stylesheet" media="all">
    <link href="{{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}}" rel="stylesheet" media="all">
    <link href="{{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}}" rel="stylesheet" media="all">
    <link href="{{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{{ asset('vendor/bootstrap-4.1/bootstrap.min.css')}}}" rel="stylesheet" media="all">

    <link href="{{{ asset('vendor/animsition/animsition.min.css')}}}" rel="stylesheet" media="all">

    <!-- Datepicker-->
    <link href="{{{ asset('css/bootstrap-datetimepicker.min.css') }}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{{ asset('css/theme.css')}}}" rel="stylesheet" media="all">

    <!-- Custom CSS -->
    <link href="{{{ asset('css/style.css')}}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

</body>
</html>
