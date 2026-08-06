@extends('admin.layouts.master')

@section('title', 'Add Product')
@section('page_title', 'Add Product')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7 col-xl-6">

        <div class="card common-card">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0">
                        <i class="fas fa-box-open "></i>
                        Update  Product
                    </h3>

                    <a href="{{ route('admin.product.index') }}"
                       class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>

                </div>
            </div>

            <form action="{{ route('admin.product.update' , $product->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                  @csrf
                  @method('PUT')

                <div class="card-body">

                    <div class="row">

                        {{-- Product Name --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Product Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $product->name ) }}"
                                       placeholder="Enter Product Name">

                                @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- SKU --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    SKU
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       name="sku"
                                       class="form-control @error('sku') is-invalid @enderror"
                                       value="{{ old('sku', $product->sku) }}"
                                       placeholder="Enter SKU">

                                @error('sku')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- Barcode --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Barcode</label>

                                <input type="text"
                                       name="barcode"
                                       class="form-control @error('barcode') is-invalid @enderror"
                                       value="{{ old('barcode' , $product->barcode) }}"
                                       placeholder="Enter Barcode">

                                @error('barcode')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>
                                    Category
                                    <span class="text-danger">*</span>
                                </label>

                               <select
                                    name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">

                                    <option value="">
                                        Select Category
                                    </option>

                                    @foreach($categories as $category)

                                        <option
                                            value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>

                                    @endforeach

                                </select>



                                @error('category_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- Supplier --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>
                                    Supplier
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="supplier_id"
                                    class="form-control @error('supplier_id') is-invalid @enderror">

                                    <option value="">
                                        Select Supplier
                                    </option>

                                    @foreach($suppliers as $supplier)

                                        <option
                                                value="{{ $supplier->id }}"
                                                {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->supplier_name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('supplier_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- Purchase Price --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>
                                    Purchase Price
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number"
                                       step="0.01"
                                       name="purchase_price"
                                       class="form-control @error('purchase_price') is-invalid @enderror"
                                       value="{{ old('purchase_price', $product->purchase_price) }}"
                                       placeholder="0.00">

                                @error('purchase_price')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- Selling Price --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>
                                    Selling Price
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number"
                                       step="0.01"
                                       name="selling_price"
                                       class="form-control @error('selling_price') is-invalid @enderror"
                                       value="{{ old('selling_price'  ,$product->selling_price) }}"
                                       placeholder="0.00">

                                @error('selling_price')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                                                {{-- Quantity --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Quantity
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number"
                                       name="quantity"
                                       min="0"
                                       class="form-control @error('quantity') is-invalid @enderror"
                                       value="{{ old('quantity', $product->quantity) }}"
                                       placeholder="Enter Quantity">

                                @error('quantity')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Unit --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>
                                    Unit
                                    <span class="text-danger">*</span>
                                </label>

                                <select name="unit"
                                        class="form-control @error('unit') is-invalid @enderror">
                                        <option value="">Select Unit</option>
                                        <option value="Piece" {{ old('unit', $product->unit) == 'Piece' ? 'selected' : '' }}>Piece</option>
                                        <option value="Kg" {{ old('unit', $product->unit) == 'Kg' ? 'selected' : '' }}>Kg</option>
                                        <option value="Gram" {{ old('unit', $product->unit) == 'Gram' ? 'selected' : '' }}>Gram</option>
                                        <option value="Liter" {{ old('unit', $product->unit) == 'Liter' ? 'selected' : '' }}>Liter</option>
                                        <option value="Meter" {{ old('unit', $product->unit) == 'Meter' ? 'selected' : '' }}>Meter</option>
                                        <option value="Box" {{ old('unit', $product->unit) == 'Box' ? 'selected' : '' }}>Box</option>

                                </select>

                                @error('unit')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>


                        {{-- Description --}}
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>Description</label>

                                <textarea
                                name="description"
                                rows="3"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter Product Description">{{ old('description', $product->description) }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Status</label>

                                <div class="mt-2">

                                   <div class="custom-control custom-radio custom-control-inline">

                                        <input type="radio"
                                            id="active"
                                            name="status"
                                            value="1"
                                            class="custom-control-input"
                                            {{ old('status', $product->status) == 1 ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="active">
                                            Active
                                        </label>

                                    </div>


                                    <div class="custom-control custom-radio custom-control-inline">

                                        <input type="radio"
                                            id="inactive"
                                            name="status"
                                            value="0"
                                            class="custom-control-input"
                                            {{ old('status', $product->status) == 0 ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="inactive">
                                            Inactive
                                        </label>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer text-right">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Update Product

                    </button>

                    <button type="reset"
                            class="btn btn-secondary">

                        <i class="fas fa-redo"></i>
                        Reset

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

document.getElementById('image').addEventListener('change', function(e){

    let reader = new FileReader();

    reader.onload = function(event){

        document.getElementById('preview-image').src = event.target.result;

    }

    if(e.target.files[0]){

        reader.readAsDataURL(e.target.files[0]);

    }

});

</script>

@endpush
