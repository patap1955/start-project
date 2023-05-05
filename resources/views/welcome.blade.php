<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>МУП КОМФОРТ</title>
    <link rel="stylesheet" href="{{ asset('/fonts/myFonts.css') }}">
    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="{{ mix('/sass/index.scss') }}"> --}}
    @vite(['resources/src/assets/scss/main.scss', 'resources/js/app.js'])
</head>

<body>
    <button class="burger">
        <img src="{{ asset('assets/img/burger.svg') }}" alt="">
    </button>
    {{-- <button class="mobile-menu__close-btn">
        <img src="{{ asset('assets/img/close-btn.svg') }}" alt="">
    </button> --}}
    {{-- @yield('') --}}

    @include('components.header')
    @include('components.main')
    {{-- <h1>HELLO</h1> --}}
</body>

</html>
