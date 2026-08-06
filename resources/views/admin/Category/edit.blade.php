@extends('admin.layouts.master')

@section('title', 'update Category')

@section('page_title', 'Update Category')

@section('content')


<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card">

                   <div class="card-header custom-card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title mb-0">
                                    <i class="ti ti-category me-1"></i>
                                    Update Category
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-3">

                       <form action="{{ route('admin.Category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Category Name -->
                            <div class="mb-4">

                                <label for="name" class="form-label fw-semibold">
                                    Category Name <span class="text-danger">*</span>
                                </label>
                                <input  type="text"  id="name"  name="name"  class="form-control @error('name') is-invalid @enderror"  placeholder="Enter category name"
                                value="{{ old('name', $category->name) }}">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold d-block">
                                    Status  <span class="text-danger">*</span>
                                </label>

                                <div class="status-group d-flex gap-4">

                                    <!-- Active -->
                                    <div class="form-check">

                                        <input
                                            class="form-check-input"  type="radio" name="status"  id="status_active"   value="1"  {{ old('status', $category->status) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active"> Active </label>
                                    </div>

                                    <!-- Inactive -->
                                    <div class="form-check">

                                        <input
                                            class="form-check-input"  type="radio"  name="status"  id="status_inactive" value="0"  {{ old('status', $category->status) == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label"  for="status_inactive"> Inactive </label>

                                    </div>
                                </div>
                                @error('status')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                                <hr>
                                <!-- Buttons -->
                                <div class="action-buttons d-flex gap-2">
                                    <button type="submit"  class="btn btn-success">
                                        <i class="ti ti-device-floppy me-1"></i>
                                        Update Category
                                    </button>

                                    <a href="{{ route('admin.Category.index') }}"  class="btn btn-danger">
                                        <i class="ti ti-x me-1"></i>
                                        Cancel
                                    </a>
                                </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
