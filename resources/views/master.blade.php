<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include("layouts.head")

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>
