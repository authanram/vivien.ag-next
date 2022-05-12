@extends('layouts.default')

@push('title')
    @cache("$cacheKey:title")
        <div class="view x-parsedown">
            {!! $title !!}
        </div>
    @endcache
@endpush

@push('content')
    @cache("$cacheKey:content")
        <div class="view x-parsedown">
            {!! $content !!}
        </div>
    @endcache
@endpush
