@php($assets = (object)[
    'alpinejs' => 'https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js',
    'font' => 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900&display=swap',
    'css' => tailwindcss('/css/app.css'),
    'js' => mix('/dist/js/app.js'),
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="{{ config('env.HEAD_ROBOTS_CONTENT') }}">
    <title>{{ ($title ?? null) ? "$title - " : '' }}{{ config('app.name') }}</title>
    <x-layout.favicon />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preload" href="{{ $assets->font }}" as="style">
    <link rel="preload" href="{{ $assets->css }}" as="style">
    <link rel="preload" href="{{ $assets->alpinejs }}" as="script">
    <link rel="preload" href="{{ $assets->js }}" as="script">
    <link rel="stylesheet" href="{{ $assets->font }}">
    <link rel="stylesheet" href="{{ $assets->css }}">
    @livewireStyles
    @stack('styles')
    <x-layout.google-tagmanager scripts />
    <script defer src="{{ $assets->alpinejs }}"></script>
    <script defer src="{{ $assets->js }}"></script>
</head>
<body class="font-display font-light h-screen overflow-y-scroll relative text-base text-gray-700">
    <x-layout.google-tagmanager class="leading-7 mt-3 sm:mt-4 text-gray-500 text-xl" />
    <x-layout.background styles />
    <div class="min-h-full relative z-0">
        {{--@include('cookie-consent::index')--}}
        <x-layout.background />
        @yield('body')
    </div>
    @livewireScripts
    @stack('scripts')
</body>
</html>
