@extends('admin.layouts.master')

@section('title', 'Product')

@section('page_title', 'Product List')

@section('content')

<div class="card card-outline card-primary">

    <!-- Card Header -->
    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title">
                <i class="fas fa-box-open mr-2"></i>
                Product List
            </h3>

            <a href="{{ route('admin.product.show') }}"
               class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Product
            </a>

        </div>

    </div>

    <!-- Card Body -->
    <div class="card-body">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" id="success-alert">

                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>

                {{ session('success') }}

            </div>
        @endif

        <!-- Search -->
        <form method="GET"
              action="{{ route('admin.product.index') }}"
              class="mb-3">

            <div class="input-group">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search Product..."
                       value="{{ request('search') }}">

                <div class="input-group-append">

                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>

                    @if(request('search'))
                        <a href="{{ route('admin.product.index') }}"
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

                        <th width="50">#</th>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Purchase</th>
                        <th>Selling</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th width="140">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>
                            {{ $loop->iteration + ($products->firstItem() - 1) }}
                        </td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->sku }}</td>

                        <td>{{ $product->category->name ?? '-' }}</td>

                        <td>{{ $product->supplier->supplier_name ?? '-' }}</td>

                        <td>₹ {{ number_format($product->purchase_price,2) }}</td>

                        <td>₹ {{ number_format($product->selling_price,2) }}</td>

                        <td>

                            <span class="badge badge-info">
                                {{ $product->quantity }}
                            </span>

                        </td>

                        <td>

                            @if($product->status)

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

                            <a href="{{ route('admin.product.view', $product->id) }}"
                               class="btn btn-warning btn-sm"
                               title="View">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{  route('admin.product.edit', $product->id ) }}"
                               class="btn btn-info btn-sm"
                               title="Edit">

                                <i class="fas fa-edit"></i>

                            </a>

                              <a href="{{ route('admin.product.delete', $product->id) }}"
                               class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure you want to delete this product?')"
                               title="Edit">

                                <i class="fas fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="11" class="text-center text-muted">

                            No Products Found.

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
                {{ $products->firstItem() ?? 0 }}
                to
                {{ $products->lastItem() ?? 0 }}
                of
                {{ $products->total() }}
                entries

            </div>

            <div>

                {{ $products->appends(request()->query())->links() }}

            </div>

        </div>

    </div>

</div>

<script>

setTimeout(function(){

    let alert = document.getElementById('success-alert');

    if(alert){

        alert.style.opacity = "0";

        setTimeout(function(){

            alert.remove();

        },500);

    }

},4000);

</script>

@endsection
