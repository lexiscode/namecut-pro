
@extends('frontend.layouts.master')


@section('forgot-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}" />
@endsection

@section('main-content')




    <!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">
        <div class="containerr">
          <h1>Forgot Password</h1>
          <div class="form">
            <div class="form-group">
              <input type="text" required />
              <label for="">Enter your email</label>
            </div>
            <div class="btn-groupp">
              <button for="one" class="btn btn-f">Send</button>
            </div>
          </div>
        </div>
    </section>
    <br>

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">

      <div class="sub_section">
        <h2>Forgot Password</h2> <br>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter your email">
        </div>
        <div style="text-align: center">
          <button type="submit" class="btn btn-warning">Submit</button>
        </div>
      </div>

    </section>
    <br/><br/>


@endsection
