@extends('frontend.layouts.master')


@section('forgot-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}" />
@endsection

@section('main-content')

    <!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">
        <div class="containerr">
            <h1>Forgot Password</h1>
            <br>
            <form method="POST" action="{{ route('forgot-password.send') }}">
            @csrf
                <div class="form">
                    <div class="form-group">
                        <input type="text" name="email" required />
                        <label for="">Enter your email</label>
                    </div>
                    <div class="btn-groupp">
                        <button type="submit" for="one" class="btn btn-f">Send Reset Link</button>
                    </div>
                    <br>
                    @if (session('success'))
                        <div style="margin: 0 auto; text-align: center; color: green">
                            <b>{{ session('success') }}</b>
                        </div>
                        <br>
                    @endif
                    @if (session('error'))
                        <div style="margin: 0 auto; text-align: center; color: red">
                            <b>{{ session('error') }}</b>
                        </div>
                        <br>
                    @endif

                </div>
            </form>
        </div>
    </section>
    <br>

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">

      <div class="sub_section">
        <h2>Forgot Password</h2> <br>

        @if (session()->has('success'))
            <i style="margin: 0 auto; text-align: center; color: green">
                <b>{{ session()->get('success') }}</b>
            </i>
            <br>
        @endif

        @if (session()->has('error'))
            <i style="margin: 0 auto; text-align: center; color: red">
                <b>{{ session()->get('error') }}</b>
            </i>
            <br>
        @endif

        <form method="POST" action="{{ route('forgot-password.send') }}">
            @csrf
            <div class="mb-3">
            <input type="text" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div style="text-align: center">
            <button type="submit" class="btn btn-warning">Send Reset Link</button>
            </div>
        </form>
      </div>

    </section>
    <br/><br/>


@endsection
