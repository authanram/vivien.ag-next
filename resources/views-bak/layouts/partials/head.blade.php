@php($font = 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;900&display=swap')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="{{ config('env.HEAD_ROBOTS_CONTENT') }}">
<title>{{ ($title ?? null) ? "$title - " : '' }}{{ config('app.name') }}</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
@include('layouts.partials.favicon')
<link rel="preload" href="{{ $font }}" as="style">
<link rel="preload" href="{{ tailwindcss('/css/app.css') }}" as="style">
<link rel="preload" href="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js" as="script">
<link rel="preload" href="{{ mix('/dist/js/app.js') }}" as="script">
<link rel="stylesheet" href="{{ $font }}">
<link rel="stylesheet" href="{{ tailwindcss('/css/app.css') }}">
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<script defer src="{{ mix('/dist/js/app.js') }}"></script>
