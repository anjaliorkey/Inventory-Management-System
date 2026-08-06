@extends('admin.layouts.master')

@section('title', 'Deleted Products')
@section('page_title', 'Deleted Products')

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
                        Deleted Product List
                    </h3>

                    <a href="{{ route('admin.product.index') }}"
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
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Deleted Date</th>
                                <th class="text-center" width="200">
                                    Action
                                </th>
                            </tr>

                        </thead>


                        <tbody>

                        @forelse($products as $product)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    @if($product->image)

                                        <img src="{{ asset('storage/products/'.$product->image) }}"
                                             width="50"
                                             height="50"
                                             class="img-thumbnail">

                                    @else

                                        <span class="text-muted">
                                            No Image
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $product->name }}
                                </td>


                                <td>
                                    {{ $product->sku }}
                                </td>


                                <td>
                                    {{ $product->category->name ?? 'N/A' }}
                                </td>


                                <td>
                                    ₹ {{ number_format($product->selling_price,2) }}
                                </td>


                                <td>
                                    {{ $product->deleted_at->format('d M Y') }}
                                </td>


                                <td class="text-center">


                                    <form action="{{ route('admin.product.restore',$product->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        <button type="submit"
                                                class="btn btn-success btn-sm">

                                            <i class="fas fa-trash-restore"></i>
                                            Restore

                                        </button>

                                    </form>



                                    <form action="{{ route('admin.product.forceDelete',$product->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')


                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to permanently delete this product?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>


                                </td>


                            </tr>


                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center">

                                    <span class="text-muted">
                                        No deleted products found.
                                    </span>

                                </td>

                            </tr>


                        @endforelse


                        </tbody>

                    </table>


                </div>


            </div>


            @if($products->hasPages())

                <div class="card-footer d-flex justify-content-center">

                    {{ $products->links() }}

                </div>

            @endif


        </div>


    </div>

</div>

@endsection
