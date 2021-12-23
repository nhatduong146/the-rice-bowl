<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('public/front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/style.css') }}">

    @yield('css')
</head>

<body>
    <!-- header -->
    @include("includes.header")

    @yield('content')

    <!-- footer -->
    @include("includes.footer")


    <script src="{{ asset('public/front-end/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/aos.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('public/front-end/js/google-map.js') }}"></script>
    <script src="{{ asset('public/front-end/js/main.js') }}"></script>
</body>

</html>
