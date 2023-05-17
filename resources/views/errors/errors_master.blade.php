<!doctype html>
<html lang="en" data-theme-mode="purple">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'STMS | Error')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />

        @include('backend.layouts.partials.styles')
        @yield('styles')

    </head>

    <body data-topbar="dark">

        <!-- <body data-layout="horizontal"> -->
        @yield('error-content')
        <!-- end content -->
        
        <!-- JAVASCRIPT -->
        @include('backend.layouts.partials.scripts')
        @yield('scripts')

    </body>

</html>
