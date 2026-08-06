@extends('admin.layouts.master')

@section('title', 'View Product')
@section('page_title', 'Product Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card common-card">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        <i class="fas fa-box-open mr-2"></i>
                        Product Details
                    </h3>

                    <a href="{{ route('admin.product.index') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>

                </div>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="30%">Product Name</th>
                        <td>{{ $product->name }}</td>
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td>{{ $product->category->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Supplier</th>
                        <td>{{ $product->supplier->supplier_name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>SKU</th>
                        <td>{{ $product->sku ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Barcode</th>
                        <td>{{ $product->barcode ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Purchase Price</th>
                        <td>₹ {{ number_format($product->purchase_price, 2) }}</td>
                    </tr>

                    <tr>
                        <th>Selling Price</th>
                        <td>₹ {{ number_format($product->selling_price, 2) }}</td>
                    </tr>

                    <tr>
                        <th>Quantity</th>
                        <td>{{ $product->quantity }}</td>
                    </tr>

                    <tr>
                        <th>Unit</th>
                        <td>{{ $product->unit ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
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
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ $product->created_at->format('d M Y h:i A') }}</td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>{{ $product->updated_at->format('d M Y h:i A') }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>
</div>

@endsection
