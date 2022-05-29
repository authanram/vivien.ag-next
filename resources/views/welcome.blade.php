@extends('layouts.default')

@push('content')
    <div class="md:flex md:space-x-4 space-y-4">
        <x-card data-content="welcome:col-left">
            @yield('col-left', '...')
        </x-card>
        <x-card data-content="welcome:col-right">
            @yield('col-right', '...')
        </x-card>
    </div>
@endpush
