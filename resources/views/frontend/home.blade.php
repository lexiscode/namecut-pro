@extends('frontend.layouts.master')

@section('main-content')

<!-- slider section -->
    <section class="slider_section long_section">
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
                @if (session()->has('success'))
                    <p class='text-sm text-green-600 space-y-1' style="text-align:center">
                        <b>{{ session()->get('success') }}</b>
                    </p>
                @endif
                @if (session('status'))
                    <p class='text-sm text-green-600 space-y-1' style="text-align:center">
                        <b>{{ session('status') }}</b>
                    </p>
                @endif
              <div class="row">
                <div class="col-md-5">

                  <div class="detail-box">
                    <h1>
                      Publish Your <br>
                      New Family Name
                    </h1>
                    <p>
                      It is a necessity for married women to have their names changed and published for it to be recognized as a legal and acceptable document.
                      Distance and location <i>is not a barrier</i> to have this done efficiently and in no time.
                    </p>
                    <div class="btn-box">
                        @guest
                        <a href="/register" class="btn1">
                            <b>UPLOAD DATA</b>
                        </a>
                        @endguest
                        @auth
                            @if($clientForm)
                                <a href="#" class="btn1">
                                    <b>PAY NOW!</b>
                                </a>
                            @else
                                <a href="/client-form" class="btn1">
                                    <b>UPLOAD DATA</b>
                                </a>
                            @endif
                        @endauth
                        <a href="/verification" class="btn2">
                            <b>VERIFY DATA</b>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{ asset('frontend/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Good Wishes To <br>
                      Your New Home
                    </h1>
                    <p>
                      It is a necessity for married women to have their names changed and published for it to be recognized as a legal and acceptable document.
                      Distance and location <i>is not a barrier</i> to have this done efficiently and in no time.
                    </p>
                    <div class="btn-box">
                        @guest
                        <a href="/register" class="btn1">
                            <b>UPLOAD DATA</b>
                        </a>
                        @endguest
                        @auth
                            @if($clientForm)
                                <a href="#" class="btn1">
                                    <b>PAY NOW!</b>
                                </a>
                            @else
                                <a href="/client-form" class="btn1">
                                    <b>UPLOAD DATA</b>
                                </a>
                            @endif
                        @endauth
                        <a href="/verification" class="btn2">
                            <b>VERIFY DATA</b>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{ asset('frontend/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel" data-slide-to="1"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->

@endsection
