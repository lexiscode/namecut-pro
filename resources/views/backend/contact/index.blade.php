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
                        <h1>Our Mail Messages</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Messages</li>
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
                            <h4 class="card-title">All Client Messages</h4>
                        </div>
                    </div>
                    @if ($contacts->isEmpty())
                        <p>No mails sent yet.</p>
                    @else
                        @foreach ($contacts as $contact)
                        <div class="card-body">
                            <div class="media">
                                <div class="dot-online">
                                    <div class="bg-img mr-2">
                                        <img class="img-fluid" src="{{ asset("backend/assets/img/avtar/01.jpg") }}" alt="listwidget-img">
                                    </div>
                                </div>
                                <div class="media-body ml-2">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-0">Name: {{ $contact->name }}</h4>
                                        <span>{{ $contact->created_at }}</span>
                                    </div>
                                    <br>
                                    <p><b>Phone Number:</b>{{ $contact->phone_no }}</p> <br>
                                    <p><b>Email Address:</b>{{ $contact->email }}</p> <br>
                                    <p><b>Message:</b>{{ $contact->message }}</p> <br>
                                    <br>
                                    <div>
                                        <ul class="nav align-items-center">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.contact.destroy', $contact->id) }}" class="btn btn-icon btn-outline-danger nav-link btn-round delete-item">
                                                    <i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->

@endsection

