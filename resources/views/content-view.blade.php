@extends('layouts.default')

@push('title')
    @cache("route:$routeId:title")
        <div class="x-parsedown view">
            {!! $title !!}
        </div>
    @endcache
@endpush

@push('content')
    @cache("route:$routeId:content")
        <div class="x-parsedown view">
            {!! $content !!}
        </div>
    @endcache
@endpush
