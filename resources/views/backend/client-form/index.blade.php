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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Client Entries</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-xxl-9 m-b-30">
                <div class="card card-statistics dating-contant h-100 mb-0">
                    <div class="card-header d-flex align-items-center justify-content-between"> <!---->
                        <h4 class="card-title">All Client Entries</h4>
                    </div>
                    <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="table table-borderless table-striped">

                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Phone No.</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-muted">
                                    @if ($client_entries->isEmpty())
                                        <p>No client entry.</p>
                                    @else
                                        @foreach ($client_entries as $client_entry)
                                        <tr>
                                            <td>{{ $client_entry->id }}</td>
                                            <td>
                                                <p>{{ $client_entry->fullname }}</p>
                                            </td>
                                            <td>{{ $client_entry->phone_no }}</td>
                                            <td>
                                                <a href="{{ route('admin.client-form.edit', $client_entry->id) }}" class="mr-2">
                                                    <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                </a>
                                                <a href="{{ route('admin.client-form.destroy', $client_entry->id) }}" class="delete-item">
                                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <!-- Simple pagination links -->
                            <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                                {{ $client_entries->links('pagination::simple-bootstrap-4') }}
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

