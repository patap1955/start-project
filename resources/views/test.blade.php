<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="@yield("description")" />
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('/fonts/nextArt/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/PTSans/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ mix('/assets/css/main.css') }}">
    @yield("css")
</head>
<body>
<script src="{{ mix('/assets/js/main.js') }}"></script>
@yield("scripts")
</body>
</html>



