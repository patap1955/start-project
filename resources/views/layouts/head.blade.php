<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="@yield("description")" />
    <meta name="keywords" content="@yield("keywords")" />
    <title>@yield("title")</title>
    {{-- <link rel="stylesheet" href="{{ asset('/fonts/nextArt/stylesheet.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/fonts/myFonts.css') }}">
    @vite(['resources/src/assets/main.scss', 'resources/js/app.js'])
    @yield("css")
</head>
