<!DOCTYPE html>
<html lang="en" data-theme-mode="purple">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'STMS | Stock Management System')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Md.Rabbi" name="author" />
       
        @include('backend.layouts.partials.styles')
        @yield('styles')
    </head>

    <body data-topbar="dark">
        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('backend.layouts.partials.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.layouts.partials.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    @yield('backend-content')
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('backend.layouts.partials.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('backend.layouts.partials.right_sidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        @include('backend.layouts.partials.scripts')
        @yield('scripts')
    </body>
</html>
