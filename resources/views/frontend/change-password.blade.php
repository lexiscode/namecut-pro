@extends('frontend.layouts.master')

@section('change-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}" />
@endsection

@section('main-content')

<!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">
        <div class="containerr">
          <h1>Change Password</h1>
          <div class="form">
            <div class="form-group">
              <input type="text" required />
              <label for="">Enter your email</label>
            </div>
            <div class="form-group">
              <input type="password" required />
              <label for="">Enter new password</label>
            </div>
            <div class="form-group">
              <input type="password" required />
              <label for="">Repeat new password</label>
            </div>
            <div class="btn-groupp">
              <button for="one" class="btn btn-f">Update</button>
            </div>
          </div>
        </div>
    </section>
    <br>

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">

      <div class="sub_section">
        <h2>Change Password</h2> <br>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Enter new password">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Repeat new password">
        </div>
        <div style="text-align: center">
          <button type="submit" class="btn btn-warning">Submit</button>
        </div>
      </div>

    </section>
    <br/><br/>

@endsection

