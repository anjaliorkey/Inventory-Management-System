@extends('admin.layouts.master')

@section('title','Supplier')

@section('page_title','Supplier List')

@section('content')

<div class="card  card-outline">

    <!-- Card Header -->
    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title">
                <i class="fas fa-truck"></i>
                Supplier List
            </h3>

            <a href="{{ route('admin.supplier.show') }}"
               class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Supplier
            </a>

        </div>

    </div>

    <!-- Card Body -->

    <div class="card-body">

        @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" id="success-alert">

            <button class="close" data-dismiss="alert">&times;</button>

            {{ session('success') }}

        </div>

        @endif

        <!-- Search -->

        <form method="GET" action="{{ route('admin.supplier.index') }}" class="mb-3">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search Category">

                <div class="input-group-append">

                    <button class="btn btn-primary">

                        <i class="fas fa-search"></i>

                    </button>

                    @if(request('search'))

                    <a href="{{ route('admin.supplier.index') }}"
                       class="btn btn-secondary">

                        Reset

                    </a>

                    @endif

                </div>

            </div>

        </form>

        <!-- Table -->

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="thead-dark">

                <tr>

                    <th width="60">#</th>

                    <th>Company Name</th>

                    <th>Supplier Name</th>

                    <th>Mobile</th>

                    <th>Email</th>

                    <th>City</th>

                    <th>Status</th>

                    <th width="130">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($suppliers as $supplier)

                    <tr>

                        <td>
                            {{ $loop->iteration + ($suppliers->firstItem() - 1) }}
                        </td>

                        <td>{{ $supplier->company_name }}</td>

                        <td>{{ $supplier->supplier_name }}</td>

                        <td>{{ $supplier->mobile }}</td>

                        <td>{{ $supplier->email ?? '-' }}</td>

                        <td>{{ $supplier->city }}</td>

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

                        <td>

                            <a href="{{ route('admin.supplier.edit', $supplier->id ) }}"
                               class="btn btn-sm btn-info">

                                <i class="fas fa-edit"></i>

                            </a>

                            <a href="{{ route('admin.supplier.delete', $supplier->id ) }}"
                               class="btn btn-sm btn-danger">

                                <i class="fas fa-trash"></i>

                            </a>

                            <a href="{{ route('admin.supplier.view', $supplier->id ) }}"
                               class="btn btn-sm btn-warning">

                                <i class="fas fa-eye"></i>

                            </a>




                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            No Suppliers Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <!-- Pagination -->

        <div class="d-flex justify-content-between align-items-center mt-3">

            <div>

                Showing
                {{ $suppliers->firstItem() ?? 0 }}
                to
                {{ $suppliers->lastItem() ?? 0 }}
                of
                {{ $suppliers->total() }}
                entries

            </div>

            <div>

                {{ $suppliers->appends(request()->query())->links() }}

            </div>

        </div>
    </div>

</div>

<script>
   setTimeout(function(){
    let alert = document.getElementById('success-alert');
    if(alert){
        alert.style.opacity="0";
        setTimeout(()=>{
            alert.remove();
        },500);
      }
   },4000);

</script>



</script>

@endsection
