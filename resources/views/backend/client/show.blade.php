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
                        <h1>Our Client Profile</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Client Profile</li>
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
                            <h4 class="card-title">All Client's Profile History</h4>
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
                                    <h4 class="mb-0">Client #ID: {{ $client->id }}</h4>
                                    <span>{{ $client->created_at }}</span>
                                </div>
                                <br>
                                <p><b>Username:</b> {{ $client->username }}</p> <br>
                                <p><b>Email:</b> {{ $client->email }}</p> <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-4 m-b-30">
                <div class="card card-statistics h-100 mb-0 widget-recent-list">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">All Client's Entry</h4>
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

                                @if ($client->client_form)
                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-0">Client Entry #ID: {{ $client->client_form->id }}</h4>
                                        <span>{{ $client->client_form->created_at }}</span>
                                    </div>
                                    <br>

                                    <p><b>Full Name:</b> {{ $client->client_form->fullname }}</p> <br>
                                    <p><b>Phone Number:</b> {{ $client->client_form->phone_no }}</p> <br>
                                    <p><b>Affidavit:</b>
                                        <a href="{{ $client->client_form->affidavit }}" target="_blank">View Me!</a>
                                    </p> <br>
                                    <p><b>Certificate:</b>
                                        <a href="{{ $client->client_form->certificate }}" target="_blank">View Me!</a>
                                    </p>
                                @else
                                    <p>No entries for this client.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-4 m-b-30">
                <div class="card card-statistics h-100 mb-0 widget-recent-list">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Client's Payment Data</h4>
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

                                @if ($client->payment)

                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-0">Payment #ID: {{ $client->payment->payment_id }}</h4>
                                        <span>{{ $client->payment->created_at }}</span>
                                    </div>
                                    <br>

                                    <p><b>Product Name:</b> {{ $client->payment->product_name }}</p> <br>
                                    <p><b>Amount:</b> {{ $client->payment->amount }}</p> <br>
                                    <p><b>Payment Method:</b> {{ $client->payment->payment_method }}</p> <br>
                                    <p><b>Payment Status:</b> {{ $client->payment->payment_status }}</p> <br>
                                    <p><b>Verification:</b> {{ $client->payment->verification }}</p>

                                @else
                                    <p>No payment made yet by this client.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-4 m-b-30">
                <div class="card card-statistics h-100 mb-0 widget-recent-list">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Client's Published Receipt</h4>
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

                                @if ($client->publish_receipt)
                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-0">Publish #ID: {{ $client->publish_receipt->id }}</h4>
                                        <span>{{ $client->publish_receipt->created_at }}</span>
                                    </div>
                                    <br>

                                    <p><b>Published Receipt:</b>
                                        <a href="{{ $client->publish_receipt->receipt_file }}" target="_blank">View Me!</a>
                                    </p>
                                @else
                                    <p>No receipt published yet for this client.</p>
                                @endif

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
