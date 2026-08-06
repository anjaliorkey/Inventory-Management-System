@extends('admin.layouts.master')

@section('title', 'Add Category')
@section('page_title', 'Add Category')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5 col-xl-4">

        <div class="card common-card">

            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-plus text-primary"></i>  Add Category
                    </h3>

                    <a href="{{ route('admin.Category.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

             <form action="{{ route('admin.Category.add') }}" method="POST">

              @csrf

                <div class="card-body py-3">

                    <div class="row">

                        <!-- Category Name -->
                        <div class="col-md-12">

                            <div class="form-group mb-3">

                                <label class="mb-1">
                                    Category Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    placeholder="Enter Category Name">

                                @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Status -->
                        <div class="col-md-12">

                            <div class="form-group mb-3">

                                <label class="mb-1">
                                    Status
                                </label>

                                <div class="mt-1">

                                    <div class="custom-control custom-radio custom-control-inline">

                                        <input type="radio"
                                            id="active"
                                            name="status"
                                            value="1"
                                            class="custom-control-input"
                                            {{ old('status',1) == 1 ? 'checked' : '' }}>

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
                                            {{ old('status') == '0' ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="inactive">
                                            Inactive
                                        </label>

                                    </div>

                                </div>

                            </div>

                        </div>
                </div>

                </div>


                <div class="card-footer py-2 text-right">

                    <button type="submit"
                            class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i>
                        Save Category
                    </button>

                    <button type="reset"
                            class="btn btn-secondary btn-sm">
                        <i class="fas fa-redo"></i>
                        Reset
                    </button>




                </div>


            </form>



        </div>

    </div>
</div>

@endsection
