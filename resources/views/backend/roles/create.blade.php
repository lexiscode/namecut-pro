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
                        <h1>Our Roles & Permissions</h1>
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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Permissionss</li>
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
                        <h4 class="card-title">Create Role's Permissions Here</h4>
                        <div class="dropdown">
                            <a class="btn btn-secondary" href="{{ route('admin.role.index') }}" aria-haspopup="true" aria-expanded="false">
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
                                <form method="POST" action="{{ route('admin.role.store') }}" class="needs-validation" novalidate="">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Enter name of role">
                                        <div class="invalid-feedback">
                                            Please fill in a role name
                                        </div>
                                        @error('role')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        @foreach ($permissions as $groupName => $permission)
                                            <p><b>{{ $groupName }}:</b></p>
                                            <div class="row">
                                                @foreach ($permission as $item)
                                                <div class="form-group col-md-2">
                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" value="{{ $item->name }}" name="permissions[]" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">{{ $item->name }}</span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary btn-block">Create</button>
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

