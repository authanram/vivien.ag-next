@extends('layouts.default')

@push('title')
    @cache("$cacheKey:title")
        {!! $title !!}
    @endcache
@endpush

@push('content')
    @cache("$cacheKey:content")
        {!! $content !!}
    @endcache
@endpush
