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
                        <h1>Our Client Forms</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Client Entries
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Edit Client Entry</li>
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
                        <h4 class="card-title">Edit Client Entries Here</h4>
                        <div class="dropdown">
                            <a class="btn btn-secondary" href="{{ route('admin.client-entry.index') }}" aria-haspopup="true" aria-expanded="false">
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
                                <form method="POST" action="{{ route('admin.client-entry.update', $client_entry->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="user_id" value="{{ $client_entry->user_id }}">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fullname" value="{{ $client_entry->fullname }}" placeholder="Enter full name">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phone_no" value="{{ $client_entry->phone_no }}" placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group">
                                        <p>Affidavit Upload @if ($client_entry->affidavit) (1) @else (0) @endif</p>
                                        <input type="file" class="form-control" name="affidavit" value="{{ $client_entry->affidavit }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Certificate Upload @if ($client_entry->affidavit) (1) @else (0) @endif</p>
                                        <input type="file" class="form-control" name="certificate" value="{{ $client_entry->certificate }}">
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary btn-block">Submit Request</button>
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

