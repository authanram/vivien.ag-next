@extends('layouts.default', [$title])

@section('initial')

    @json(['routeAttendeeCreate' => routeIfExists('attendees.create')], JSON_THROW_ON_ERROR)

@endsection

@section('content')

    @if($hasEvents)

        <router-view v-bind="{ accent: '{{ accent() }}' }"></router-view>

    @else

        <div class="bg-opacity-90 bg-white border border-gray-100 margin mx-auto padding relative rounded-lg self-stretch shadow-md w-full">

            {!! content('350b70ef-87fd-4d3a-b108-d6f84d6e77f0', true)->body !!}

        </div>

    @endif

@endsection
