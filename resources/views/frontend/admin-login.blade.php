@extends('frontend.layouts.master')

@section('change-password-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}" />
@endsection

@section('main-content')

 <form method="POST" action="{{ route('admin.login') }}">
    @csrf
        <!-- Specially below is for PC and Tablet devices -->
        <section class="slider_section_client_form long_section">
        <div class="containerr">
            <h1>Admin Login</h1>
            <div class="form">
              <!--Displays "please login first" error on unauthorize admin user-->
                @if (session()->has('error'))
                <p class='text-sm text-red-600 space-y-1' style="text-align:center">
                    {{ session()->get('error') }}
                </p>
                @endif
            <div class="form-group">
                <input type="text" id="admin-email" name="email" required />
                <label for="admin-email">Enter your email address</label>
            </div>
            <div class="form-group">
                <input type="password" id="admin-password" name="password" required />
                <label for="admin-password">Enter your password</label>
            </div>
            <div class="btn-groupp">
                <button class="btn btn-f" type="submit">Login</button>
            </div>
            </div>
        </div>
        </section>
    </form>
    <br>

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">

      <div class="sub_section">
        <h2>Admin Login</h2> <br>
        <div class="mb-3">
          <input type="text" class="form-control" name="email" placeholder="Enter your email address">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div>
        <div style="text-align: center">
          <button type="submit" class="btn btn-warning">Login</button>
        </div>
      </div>

    </section>
    <br/><br/>

@endsection
