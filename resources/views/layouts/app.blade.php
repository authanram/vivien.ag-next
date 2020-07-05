<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
    @include('layouts.partials.gtm-head')
    @yield('head')
</head>
<body>
@include('layouts.partials.gtm-body')
<div class="page">
    <div class="min-h-full relative z-0">
        @include('layouts.partials.background', ['dom' => true])
        @yield('app')
    </div>
</div>
@include('layouts.partials.script')
</body>
</html>
