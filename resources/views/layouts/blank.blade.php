@extends('app')

@section('app')

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

@endsection
