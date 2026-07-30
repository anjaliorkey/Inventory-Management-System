<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Preloader -->
    @include('layouts.preloader')


    <!-- Navbar -->
    @include('layouts.navbar')


    <!-- Sidebar -->
    @include('layouts.sidebar')


    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0">
                            @yield('page_title')
                        </h1>
                    </div>


                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="#">
                                    Home
                                </a>
                            </li>

                            <li class="breadcrumb-item active">
                                @yield('page_title')
                            </li>

                        </ol>

                    </div>

                </div>

            </div>
        </div>
        <!-- /.content-header -->


        <!-- Main Content -->
        <section class="content">

            <div class="container-fluid">

                @yield('content')

            </div>

        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->


    <!-- Footer -->
    @include('layouts.footer')


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>


</div>
<!-- ./wrapper -->


@include('layouts.script')


</body>
</html>
