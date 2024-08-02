<?php
header("X-Frame-Options: ALLOWALL");
header("Content-Security-Policy: frame-ancestors 'self' https://semrush.com");

?>
<meta charset="utf-8" />
<title>Dashboard | The Automate App - Admin & Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
<link href="{{ asset('assets/admin/css/font.css') }}" type="text/css" />
<!-- Bootstrap Css -->
<link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->

<link href="{{ asset('assets/admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/user.css') }}" rel="stylesheet" type="text/css" />




<style>
    /* Default light mode styles */
    body {
        background-color: white;
        color: black;
    }

    /* Dark mode styles */
    body[data-layout-mode="dark"] {
        background-color: black;
        color: white;
    }
</style>