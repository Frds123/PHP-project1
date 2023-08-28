<!doctype html>
<html lang="zxx" class="theme-light">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">

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
    <link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/dark-color/dark-style.css">
    <link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/style.css">
    @stack('css')
    <title>NUB-20002001</title>
    <link rel="icon" type="image/png" href="{{ asset('ui/frontend-ui/assets') }}/img/nub.png">
</head>

<body>

    <!-- Start Preloader Area -->
    <x-frontend.layouts.partials.preloader />
    <!-- End Preloader Area -->
    <!-- Start Navbar Area -->

    <x-frontend.layouts.inc.header />
    <!-- End Navbar Area -->

    {{ $slot }}

    <!-- Start Footer Area -->
    <x-frontend.layouts.inc.footer />
    <!-- End Footer Area -->

    <div class="go-top"><i data-feather="arrow-up"></i></div>

    <!-- Dark/Light Toggle -->
    {{-- <div class="dark-version">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div> --}}

    <!-- All JS Link -->
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
    @stack('script')



   

</body>

</html>
