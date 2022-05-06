@extends('layouts.default')

@push('content')
    <x-card class="flex flex-col space-y-4" data-content="welcome">
        <div class="text-gray-500" data-content="welcome:updates">
            <x-markdown>
                {{--<x-content slug="welcome:updates" />--}}
            </x-markdown>
        </div>
        <hr />
        <div class="text-sm" data-content="welcome:address">
            <x-markdown>
                {{--<x-content slug="contact" :replace="['h2' => 'p']" />--}}
            </x-markdown>
        </div>
    </x-card>
@endpush
