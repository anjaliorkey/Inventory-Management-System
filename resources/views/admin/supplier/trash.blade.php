@extends('admin.layouts.master')

@section('title', 'Deleted Suppliers')
@section('page_title', 'Deleted Suppliers')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card common-card">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        <i class="fas fa-trash mr-2"></i>
                        Deleted Supplier List
                    </h3>

                    <a href="{{ route('admin.supplier.index') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>

                </div>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead>

                            <tr>
                                <th width="60">#</th>
                                <th>Company</th>
                                <th>Supplier Name</th>
                                <th>Mobile</th>
                                <th>Deleted Date</th>
                                <th class="text-center" width="200">
                                    Action
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($suppliers as $supplier)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $supplier->company_name }}
                                    </td>

                                    <td>
                                        {{ $supplier->supplier_name }}
                                    </td>

                                    <td>
                                        {{ $supplier->mobile }}
                                    </td>

                                    <td>
                                        {{ $supplier->deleted_at->format('d M Y') }}
                                    </td>

                                    <td class="text-center">

                                        <form action="{{ route('admin.supplier.restore', $supplier->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-success btn-sm">

                                                <i class="fas fa-trash-restore"></i>
                                                Restore

                                            </button>

                                        </form>

                                        <form action="{{ route('admin.supplier.forceDelete', $supplier->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to permanently delete this supplier?')">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        <span class="text-muted">
                                            No deleted suppliers found.
                                        </span>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            @if($suppliers->hasPages())

                <div class="card-footer d-flex justify-content-center">

                    {{ $suppliers->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
