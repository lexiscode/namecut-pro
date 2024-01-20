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
                        <h1>Our Publications</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Publications</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-xxl-4 m-b-30">
                <div class="card card-statistics h-100 mb-0 widget-recent-list">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">All Publications</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <div class="dot-online">
                                <div class="bg-img mr-2">
                                    <img class="img-fluid" src="{{ asset("backend/assets/img/avtar/01.jpg") }}" alt="listwidget-img">
                                </div>
                            </div>
                            <div class="media-body ml-2">
                                <div class="d-flex justify-content-between">
                                    <h4 class="mb-0">Receipt #ID: {{ $publish_receipt->id }}</h4>
                                    <span>{{ $publish_receipt->created_at }}</span>
                                </div>
                                <br>
                                <p><b>View Receipt:</b>
                                    <a href="{{ $publish_receipt->receipt_file }}" target="_blank">Show Me!</a>
                                </p>
                                <br>
                                <div>
                                    <ul class="nav align-items-center">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.publish-receipt.destroy', $publish_receipt->id) }}" class="btn btn-icon btn-outline-danger nav-link btn-round delete-item">
                                                <i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->

@endsection
