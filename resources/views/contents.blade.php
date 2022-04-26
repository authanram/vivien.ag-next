@extends('layouts.default')

@php/** @var \App\Models\Content[] $contents */@endphp
@foreach($contents as $content)
    @if(!empty(trim($content->getAttribute('caption'))))
        @push('title')
            {!! parsedown(trim($content->getAttribute('caption'))) !!}
        @endpush
        @push('content')
            @foreach($contents as $content)
                <x-card>{!! parsedown($content->getAttribute('body')) !!}</x-card>
            @endforeach
        @endpush
    @endif
@endforeach
