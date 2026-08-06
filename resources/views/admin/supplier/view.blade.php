@extends('admin.layouts.master')

@section('title', 'View Supplier')
@section('page_title', 'Supplier Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card common-card">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        <i class="fas fa-truck mr-2"></i>
                        Supplier Details
                    </h3>

                    <a href="{{ route('admin.supplier.index') }}"
                       class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>

                </div>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="30%">Supplier Name</th>
                        <td>{{ $supplier->supplier_name }}</td>
                    </tr>

                    <tr>
                        <th>Company Name</th>
                        <td>{{ $supplier->company_name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Mobile</th>
                        <td>{{ $supplier->mobile }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $supplier->email ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>GST Number</th>
                        <td>{{ $supplier->gst_no ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{ $supplier->address ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($supplier->status)
                                <span class="badge badge-success">
                                    Active
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Inactive
                                </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ $supplier->created_at->format('d M Y h:i A') }}</td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>{{ $supplier->updated_at->format('d M Y h:i A') }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>
</div>

@endsection
