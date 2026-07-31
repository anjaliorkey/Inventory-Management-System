@extends('admin.layouts.master')

@section('title', 'Categories')

@section('page_title', 'Categories')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Category List</h3>

        <div class="card-tools">
            <a href="#" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Category
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Electronics</td>
                    <td>
                        <span class="badge badge-success">Active</span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="#" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

@endsection
