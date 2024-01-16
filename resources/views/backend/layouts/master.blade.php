<!DOCTYPE html>
<html lang="en">

<head>

    <title>Namecut - Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Namecut" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

    <!-- SweetAlert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        /*This below handles the deleting functionality, alongside a <meta> in html header above*/
        // Add csrf token in ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Handle Dynamic delete
        $(document).ready(function() {
            $('.delete-item').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        console.log(url);
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            success: function(data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });

                    }
                })
            })
        })
    </script>

</body>

</html>
