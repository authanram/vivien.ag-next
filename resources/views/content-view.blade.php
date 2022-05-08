@extends('layouts.default')

@push('title')
    @cache("$cacheKey:title")
        <div class="x-parsedown view">
            {!! $title !!}
        </div>
    @endcache
@endpush

@push('content')
    @cache("$cacheKey:content")
        <div class="x-parsedown view">
            {!! $content !!}
        </div>
    @endcache
@endpush
