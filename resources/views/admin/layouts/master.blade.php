<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- Preloader --}}
    @include('admin.layouts.preloader')

    {{-- Navbar --}}
    @include('admin.layouts.navbar')

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Content Wrapper --}}
    <div class="content-wrapper">

        {{-- Content Header --}}
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0">
                            @yield('page_title', 'Dashboard')
                        </h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>

                            <li class="breadcrumb-item active">
                                @yield('page_title', 'Dashboard')
                            </li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        {{-- /.content-header --}}

        {{-- Main Content --}}
        <section class="content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </section>
        {{-- /.content --}}

    </div>
    {{-- /.content-wrapper --}}

    {{-- Footer --}}
    @include('admin.layouts.footer')

    {{-- Control Sidebar --}}
    <aside class="control-sidebar control-sidebar-dark"></aside>

</div>
{{-- ./wrapper --}}

@include('admin.layouts.script')

</body>
</html>
