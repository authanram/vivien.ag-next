@extends('layouts.default', [$title])

@section('initial')

    @json(['routeAttendeeCreate' => routeIfExists('attendees.create')], JSON_THROW_ON_ERROR)

@endsection

@section('content')

    <router-view v-bind="{ accent: '{{ accent() }}' }"></router-view>

@endsection
