<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
    @include('layouts.partials.gtm-head')
    @yield('head')
</head>
<body>
@include('layouts.partials.gtm-body')
@yield('app')
@include('layouts.partials.script')
</body>
</html>
