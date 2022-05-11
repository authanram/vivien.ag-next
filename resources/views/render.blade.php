@extends('layouts.default')

@push('title')
    foo
@endpush
@push('content')
    <x-card>
        {{ $content }}
    </x-card>
@endpush
