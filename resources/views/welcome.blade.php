@extends('layouts.default')

@push('content')
    <x-card class="flex flex-col space-y-4 welcome">
        <x-content class="text-gray-500" slug="home:updates" markdown />
        <hr />
        <x-content class="text-sm address" slug="contact" :replace="['h2' => 'p']" markdown />
    </x-card>
@endpush
