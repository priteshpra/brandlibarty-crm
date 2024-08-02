<!doctype html>
<html lang="en">
<?php header('X-Frame-Options: ALLOW'); ?>

<head>

    @include('includes.head')
</head>

<body>

    <!-- Main Wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <header id="page-topbar">

            @include('includes.header')
            <!-- /Header Menu -->
        </header>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="vertical-menu">
            @include('includes.sidebar')
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="main-content">
            <div id="loading"></div>
            @yield('content')
        </div>
        <!-- /Main Wrapper -->
        @include('includes.footer')
</body>

</html>