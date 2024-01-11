<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <!--<link rel="icon" href="images/fevicon.png" type="image/gif" />-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Namecut</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

    <!-- font awesome style -->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />

    <!--custom CSS stylings-->
    <link rel="stylesheet" href="{{ asset('frontend/css/verification.css') }}" />

    <!--custom CSS stylings-->
    <link rel="stylesheet" href="{{ asset('frontend/css/client-form.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-modal.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-modal2.css') }}" />

    <!--custom isolated CSS stylings-->
    @yield('change-password-styles')
    @yield('forgot-password-styles')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <div class="hero_area">

        <!-- Includes the header layout here-->
        @include('frontend.layouts.header')

        <!-- Main contents -->
        @yield('main-content')

    </div>

    <!-- Includes the header layout here-->
    @include('frontend.layouts.footer')


    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="{{ asset('frontend/js/custom-modal.js') }}"></script>
    <script src="{{ asset('frontend/js/custom-modal2.js') }}"></script>

</body>

</html>
