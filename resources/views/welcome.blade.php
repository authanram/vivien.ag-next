@extends('layouts.default')

@section('content')

    <x-card>

        <div class="text-gray-500">

            {!! content('65110c3b-0373-4996-b875-ac1b763a311c', true, [

                '<p>' => '<p class="mb-4">',

            ])->body !!}

        </div>

    </x-card>

@endsection

@section('sidebar')

    @include('events.events-sidebar')

@endsection
