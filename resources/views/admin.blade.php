<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset("admin/plugins/fontawesome-free/css/all.min.css") }}">
    @yield("css")
    <link rel="stylesheet" href="{{ asset("admin/css/adminlte.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/css/base.css") }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include("admin.layouts.top-navbar")
    @include("admin.layouts.sidebar")

    <div class="content-wrapper">
        @yield("content")
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
@yield("scripts")
<script src="{{ asset("admin/js/adminlte.min.js") }}"></script>
</body>
</html>

