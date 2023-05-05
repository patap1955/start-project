<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('/fonts/myFonts.css') }}">
    <link href="{{ asset('/fonts/OpenSans/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <meta name="description" content="@yield('description')" />
    <meta name="Keywords" content="@yield('keywords')" />
    @vite(['resources/src/assets/main.scss', 'resources/js/app.js'])
</head>

<body>
    <button class="burger">
        <img src="{{ asset('assets/img/burger.svg') }}" alt="">
    </button>
     <button class="mobile-menu__close-btn">
        <img src="{{ asset('assets/img/close-btn.svg') }}" alt="">
    </button>
    @include('components.header')
    @yield('content')
    @include('components.footer')

</body>

</html>
