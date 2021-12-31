<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    {{-- <link rel="stylesheet" href="{{ asset('public/front-end/css/login.css') }}"> --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    @yield('css')
    @yield('script')
</head>

<body>
    <!-- header -->
    @include("includes.header")

    @yield('content')


    @include('sweet::alert')
    <!-- footer -->
    {{-- @include("includes.footer") --}}

    <script src="{{ asset('public/front-end/js/login.js') }}"></script>
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AeRp7Afqa-rfLMVHrUPL8-aMcfmKLt8EAArheOUkMwFyLuf3sALgxG7K3WhJ-fy_aZanCTeU-BBQQEG0',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '0.01',
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
            }
        }, '#paypal-button');
    </script>
</body>

</html>
