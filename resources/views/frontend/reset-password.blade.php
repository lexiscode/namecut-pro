@extends('frontend.layouts.master')

@section('change-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}" />
@endsection

@section('main-content')

<form method="POST" action="{{ route('reset-password.send') }}">
    @csrf
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $token }}">

    <!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">
        <div class="containerr">
          <h1>Change Password</h1>
          <div class="form">
            <div class="form-group">
              <input type="text" name="email" value="{{ $email }}" required />
              <label for="">Enter your email</label>
            </div>
            <div class="form-group">
              <input type="password" name="password" required />
              <label for="">Enter new password</label>
            </div>
            <div class="form-group">
              <input type="password" name="password_confirmation" required />
              <label for="">Repeat new password</label>
            </div>
            <div class="btn-groupp">
              <button type="submit" for="one" class="btn btn-f">Reset Password</button>
            </div>
          </div>
        </div>
    </section>
</form>
<br>

<form method="POST" action="{{ route('reset-password.send') }}">
    @csrf
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $token }}">

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">

      <div class="sub_section">
        <h2>Change Password</h2> <br>
        <div class="mb-3">
          <input type="text" class="form-control" name="email" value="{{ $email }}" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Enter new password">
        </div>
        <div class="mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat new password">
        </div>
        <div style="text-align: center">
          <button type="submit" class="btn btn-warning">Reset Password</button>
        </div>
      </div>

    </section>
</form>
<br/><br/>

@endsection

