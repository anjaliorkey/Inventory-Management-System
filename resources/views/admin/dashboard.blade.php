@extends('admin.layouts.master')


@section('page_title','Dashboard')


@section('content')


<div class="row">


    <!-- Total Products -->
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>150</h3>

                <p>Total Products</p>

            </div>


            <div class="icon">

                <i class="fas fa-box"></i>

            </div>


            <a href="#" class="small-box-footer">
                More info
                <i class="fas fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>



    <!-- Total Sales -->
    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>50</h3>

                <p>Total Sales</p>

            </div>


            <div class="icon">

                <i class="fas fa-shopping-cart"></i>

            </div>


            <a href="#" class="small-box-footer">
                More info
                <i class="fas fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>




    <!-- Suppliers -->
    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>20</h3>

                <p>Suppliers</p>

            </div>


            <div class="icon">

                <i class="fas fa-truck"></i>

            </div>


            <a href="#" class="small-box-footer">
                More info
                <i class="fas fa-arrow-circle-right"></i>
            </a>


        </div>

    </div>




    <!-- Low Stock -->
    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>10</h3>

                <p>Low Stock Items</p>

            </div>


            <div class="icon">

                <i class="fas fa-exclamation-triangle"></i>

            </div>


            <a href="#" class="small-box-footer">
                More info
                <i class="fas fa-arrow-circle-right"></i>
            </a>


        </div>

    </div>



</div>


@endsection
