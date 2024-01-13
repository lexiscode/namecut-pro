@extends('frontend.layouts.master')

@section('forgot-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}" />
@endsection

@section('main-content')

<!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">

        <div class="containerr">
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
            <h1>Make Payment</h1>
            <br>
            <form id="paymentForm">
                <div class="form">
                    <div class="form-group">
                        <p><b>Name Publication</b></p>
                        <p>Price: NGN 2,000</p>
                    </div>
                    <div class="btn-groupp">
                        <button type="submit" onclick="payWithPaystack()" class="btn btn-f">Pay Now!</button>
                    </div>
                    <br>
                </div>
            </form>
        </div>

    </section>
    <br>

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">
        @if (session()->has('success'))
            <i style="margin: 0 auto; text-align: center; color: green">
                <b>{{ session()->get('success') }}</b>
            </i>
            <br>
        @endif
        <div class="sub_section">
            <h2>Make Payment</h2> <br>

            <div class="mb-3">
                <input type="text" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div style="text-align: center">
                <button type="submit" class="btn btn-warning">Pay Now!</button>
            </div>
      </div>

    </section>
    <br/><br/>

@endsection
