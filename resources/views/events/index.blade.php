@extends('layouts.default')

@push('content')
    <div class="flex">
        <div class="w-full xl:w-7/12">
            {{--@dump($events)--}}
        </div>
        <div class="w-full xl:w-5/12">
            @include('events.filter-event-template', compact('eventTemplates'))
            @include('events.filter-tags', compact('tags'))
        </div>
    </div>
@endpush
