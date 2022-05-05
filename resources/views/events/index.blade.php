@extends('layouts.default')

@push('content')
    <livewire:events />
{{--    <div class="flex">--}}
{{--        <div class="w-full xl:w-7/12">--}}
{{--            @dump($events)--}}
{{--            events--}}
{{--        </div>--}}
{{--        <div class="w-full xl:w-5/12">--}}
{{--            @include('events.filter-event-template', compact('eventTemplates'))--}}
{{--        </div>--}}
{{--    </div>--}}
@endpush
