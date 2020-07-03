@extends('layouts.default', ['title' => 'Changelog'])

@section('content')

    <x-card class="changelog">

        {!! $changelog ?? '' !!}

    </x-card>

@endsection
