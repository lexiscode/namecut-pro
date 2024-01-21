@extends('backend.layouts.master')

@section('body-content')

<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Our Moderators Roles</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Admins
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Roles</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-9 m-b-30">
                <div class="card card-statistics dating-contant h-100 mb-0">
                    <div class="card-header d-flex align-items-center justify-content-between"> <!---->
                        <h4 class="card-title">Edit Roles Here</h4>
                        <div class="dropdown">
                            <a class="btn btn-secondary" href="{{ route('admin.role-user.index') }}" aria-haspopup="true" aria-expanded="false">
                                Go Back
                            </a>
                        </div>
                    </div>

                    <div class="col-xxl-4 m-b-30">
                        <div class="card card-statistics h-100 m-b-0">
                            <div class="card-header bg-gradient">
                                <div class="row align-items-center">
                                    <div class="col-12 col-sm-6">
                                        <div class="bg-img bg-img-big m-auto m-sm-0">
                                            <img class="img-fluid" src="{{ asset("backend/assets/img/avtar/10.jpg") }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 text-center mt-3 mt-sm-0 text-sm-right">
                                        <h4 class="mb-0 text-white">Alexander Nwokorie</h4>
                                        <span class="text-white">The Co-founder</span>
                                        <h5 class="mt-3 text-white mb-0"> (+234) 902 180 1802</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.role-user.update', $user->id) }}" class="needs-validation" novalidate="">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter a name">
                                        <div class="invalid-feedback">
                                            Please fill in your name
                                        </div>
                                        @error('name')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter an email address">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter a password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat the password">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option>{{__('--Select--')}}</option>
                                            @foreach ($roles as $role)
                                                <option {{ $role->name === $user->getRoleNames()->first() ? 'selected':'' }} value="{{ $role->name }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary btn-block">Update User</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

@endsection
