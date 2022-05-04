@extends('layouts.default')

@push('title')
    @cache("route:$routeId:title")
        {!! $title !!}
    @endcache
@endpush

@push('content')
    @cache("route:$routeId:content")
        {!! $content !!}
    @endcache
@endpush
