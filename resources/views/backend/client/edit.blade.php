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
                        <h1>Edit Client Profile</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Edit Client Profile
                                </li>

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
                        <h4 class="card-title">Update your client profile here</h4>
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
                                        <span class="text-white">Co-Founder</span>
                                        <h5 class="mt-3 text-white mb-0"> (+234) 902 180 1802</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="col-md-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Edit Profile</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('admin.client-profile.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Enter new name">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter new email">
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Update Password</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('admin.client-profile-password.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">New Password</label>
                                                <input type="text" class="form-control" name="password" id="formGroupExampleInput2" placeholder="Enter new password">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Confirm New Password</label>
                                                <input type="text" class="form-control" name="password_confirmation" id="formGroupExampleInput2" placeholder="Repeat new password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                                </div>

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
