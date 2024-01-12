<!-- header section strats -->
        <header class="header_section long_section px-0">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/">
            <span>Namecut</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact Us</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">Get-Receipt</a>
                </li>
                @endauth
                </ul>
            </div>
            <div class="quote_btn-container">

                @auth
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="document.getElementById('logout-form').submit()"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><span>Logout</span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </form>
                @endauth

                @guest
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span>Login</span><i class="fa fa-user" aria-hidden="true"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="modal-content" style="background-color: #f89646">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: white">Login Panel</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div>
                                    @if (session()->has('error'))
                                    <p class='text-sm text-red-600 space-y-1' style="text-align:center">
                                        {{ session()->get('error') }}
                                    </p>
                                    @endif
                                <p class="w-50 m-auto">
                                    <label for="email" style="color: white">Email:</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="Enter Your Email" required>
                                    <br>
                                    <label for="password" style="color: white">Password:</label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password" required>
                                    <br>
                                </p>
                                </div>
                                <div style="margin: 0 auto; text-align: center;">
                                    <a style="text-transform: lowercase; color: white;" href="/register" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"><i>Create an account?</i></a>
                                    <a style="text-transform: lowercase; color: white;" href="/forgot-password" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"><i>Forgot password?</i></a>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info" name="sign-in">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                @endguest

            </div>
            </div>
        </nav>
        </header>
        <!-- end header section -->
