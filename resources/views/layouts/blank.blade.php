<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
    @include('layouts.partials.gtm-head')
    @yield('head')
</head>
<body>
@include('layouts.partials.gtm-body')
@include('cookieConsent::index')
<div id="app">
    <div class="container mx-auto">
        <div class="my-8">
            @yield('caption')
        </div>
        <div class="my-8">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.partials.script')
</body>
</html>
