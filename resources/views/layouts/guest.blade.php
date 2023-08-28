<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NUB-20002001') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- All CSS Link -->
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/animate.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/meanmenu.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/boxicons.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/magnific-popup.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/flaticon.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/odometer.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/slick.min.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/style.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/responsive.css">
		<link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/dark-color/dark-style.css">

		<title>NUB-20102011</title>

		<link rel="icon" type="image/png" href="{{ asset('ui/frontend-ui/assets') }}/img/favicon.png">
    </head>
    <body>
        <!-- Start Preloader Area -->
		<div class="preloader">
			<div class="spinner"></div>
		</div>
		<!-- End Preloader Area -->
        <div class="page-title-area">

            <div class="shape1"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape1.png" alt="shape"></div>
            <div class="shape2 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape"></div>
            <div class="shape3"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape3.svg" alt="shape"></div>
            <div class="shape4"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
            <div class="shape5"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape5.png" alt="shape"></div>
            <div class="shape6 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
            <div class="shape7"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"> </div>
            <div class="shape8 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape"></div>
            <!-- Start Login Area -->
            <div class="">
                <div class="container">
                    <div class="auth-form">
                    {{ $slot }}
                    </div>
                </div>
            </div>    
        </div>
    </body>
    
	<script src="{{ asset('ui/frontend-ui/assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/meanmenu.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/magnific-popup.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/appear.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/odometer.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/feather.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/form-validator.min.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/contact-form-script.js"></script>
    <script src="{{ asset('ui/frontend-ui/assets') }}/js/main.js"></script>
</html>
