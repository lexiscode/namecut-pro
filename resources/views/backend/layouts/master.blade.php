<!DOCTYPE html>
<html lang="en">

<head>

    <title>Namecut - Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{ asset("backend/assets/img/favicon.ico") }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset("backend/assets/css/vendors.css") }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset("backend/assets/css/style.css") }}" />

</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">

            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset("backend/assets/img/loader/loader.svg") }}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!-- Topbar Section -->
            @include('backend.layouts.topbar')

            <!-- begin app-container -->
            <div class="app-container">

                <!-- Sidebar Section -->

                @include('backend.layouts.sidebar')

                <!-- All Page Body Sections Goes Here -->
                @yield('body-content')

            </div>
            <!-- end app-container -->

            <!-- Footer Section -->
            @include('backend.layouts.footer')

        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="{{ asset("backend/assets/js/vendors.js") }}"></script>

    <!-- custom app -->
    <script src="{{ asset("backend/assets/js/app.js") }}"></script>

    <!-- SweetAlert by realrashid-->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @include('sweetalert::alert')
    
</body>

</html>
