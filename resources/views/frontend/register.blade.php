@extends('frontend.layouts.master')

@section('change-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}" />
@endsection

@section('main-content')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">
        <div class="containerr">
          <h1>Sign Up</h1>
          <div class="form">
            <div class="form-group">
              <input type="text" name="username" id="username" required />
              <label for="username">Enter a username</label>
            </div>
            <div class="form-group">
              <input type="text" name="email" id="email" required />
              <label for="email">Enter your email address</label>
            </div>
            <div class="form-group">
              <input type="password" name="password" required />
              <label for="">Enter a password</label>
            </div>
            <div class="form-group">
              <input type="password" name="password_confirmation" required />
              <label for="">Repeat password</label>
            </div>
            <div class="btn-groupp">
              <button type="submit" for="one" class="btn btn-f">Register Now!</button>
            </div>
          </div>
        </div>
    </section>
</form>
<br>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">

      <div class="sub_section">
        <h2>Change Password</h2> <br>
        <div class="mb-3">
          <input type="text" class="form-control" name="username" placeholder="Enter a username">
        </div>
        <div class="mb-3">
          <input type="text" name="email" class="form-control" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Enter a password">
        </div>
        <div class="mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password">
        </div>
        <div style="text-align: center">
          <button type="submit" class="btn btn-warning">Register Now!</button>
        </div>
      </div>

    </section>
</form>
<br/><br/>

@endsection

