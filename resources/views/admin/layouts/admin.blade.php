<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Inventory Management System')</title>

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    @include('admin.layouts.navbar')


    <!-- Sidebar -->
    @include('admin.layouts.sidebar')


    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Main Content -->
        <section class="content">

            <div class="container-fluid">

                @yield('content')

            </div>

        </section>

    </div>
    <!-- /.content-wrapper -->


    <!-- Footer -->
    @include('admin.layouts.footer')


</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>


@stack('scripts')

</body>

</html>
