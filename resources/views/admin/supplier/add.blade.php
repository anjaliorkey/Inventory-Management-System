@extends('admin.layouts.master')

@section('title', 'Add Supplier')
@section('page_title', 'Add Supplier')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7 col-xl-6">

        <div class="card common-card">

            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-plus text-primary"></i> Add Supplier
                    </h3>

                    <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.supplier.add') }}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="row">

                        <!-- Company Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Name <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="company_name"
                                       class="form-control @error('company_name') is-invalid @enderror"
                                       value="{{ old('company_name') }}"
                                       placeholder="Enter Company Name">

                                @error('company_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Supplier Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier Name <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="supplier_name"
                                       class="form-control @error('supplier_name') is-invalid @enderror"
                                       value="{{ old('supplier_name') }}"
                                       placeholder="Enter Supplier Name">

                                @error('supplier_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="mobile"
                                       class="form-control @error('mobile') is-invalid @enderror"
                                       value="{{ old('mobile') }}"
                                       placeholder="Enter Mobile Number">

                                @error('mobile')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="Enter Email">

                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- GST -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>GST Number</label>
                                <input type="text"
                                       name="gst_no"
                                       class="form-control @error('gst_no') is-invalid @enderror"
                                       value="{{ old('gst_no') }}"
                                       placeholder="Enter GST Number">

                                @error('gst_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="city"
                                       class="form-control @error('city') is-invalid @enderror"
                                       value="{{ old('city') }}"
                                       placeholder="Enter City">

                                @error('city')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- State -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="state"
                                       class="form-control @error('state') is-invalid @enderror"
                                       value="{{ old('state') }}"
                                       placeholder="Enter State">

                                @error('state')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Pincode -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pincode <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="pincode"
                                       class="form-control @error('pincode') is-invalid @enderror"
                                       value="{{ old('pincode') }}"
                                       placeholder="Enter Pincode">

                                @error('pincode')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>

                                <textarea
                                    name="address"
                                    rows="3"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Enter Complete Address">{{ old('address') }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
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
                                               {{ old('status',1)==1 ? 'checked' : '' }}>

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
                                               {{ old('status')=='0' ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Card Footer -->
                <div class="card-footer text-right">


                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Supplier
                    </button>

                     <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection
