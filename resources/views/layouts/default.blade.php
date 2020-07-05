@extends('layouts.app')

@section('app')

    <div id="app">

        @include('cookieConsent::index')

        @include('layouts.partials.background', ['style' => true])

        @include('layouts.partials.overlay')

        <div class="page">
            <div class="min-h-full relative z-0">
                @include('layouts.partials.background', ['dom' => true])
                @yield('app')
            </div>
        </div>


        <div class="h-16 shadow-lg sticky top-0 w-full z-10"></div>

        <x-card class="-mt-16 md:mb-0 sticky top-0 z-40 reject:margin padding rounded-lg shadow-md">

            @component('components.menu', ['border' => true])

                @include('layouts.partials.logo')

            @endcomponent

        </x-card>

        <x-card
            class="bg-opacity-95 md:border-b-2 md:border-gray-100 mb-5 md:mb-10 md:pb-1 pt-2 z-20 reject:bg-opacity-90 border border-gray-100 padding rounded-lg shadow-md"
            even
        >

            @includeWhen($title ?? null, 'layouts.partials.page-title')

        </x-card>

        <x-container>

            <div class="hidden md:block">

                @include('layouts.partials.design-images')

            </div>

            <div class="relative">

                @include('layouts.partials.content')

            </div>

        </x-container>

        <x-container>

            @include('layouts.partials.footer')

        </x-container>

        <div class="h-8"></div>

        @include('layouts.partials.made-with-love')

    </div>

@endsection
