@extends('layouts.default')

@php/** @var \App\Models\Content[] $contents */@endphp
@foreach($contents as $content)
    @if(!empty(trim($content->getAttribute('caption'))))
        @push('title')
            {{ trim($content->getAttribute('caption')) }}
        @endpush
        @push('content')
            @foreach($contents as $content)
                <x-card>
                    <x-markdown>
                        {{ $content->getAttribute('body') }}
                    </x-markdown>
                </x-card>
            @endforeach
        @endpush
    @endif
@endforeach
