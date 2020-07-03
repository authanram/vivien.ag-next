@extends('layouts.default')

@section('content')

    <x-card>

        {!! content('18f0895f-bdce-4a1b-a59a-e0f0ff4daed9', true, [
            '<p>' => '<p class="mb-4">',
        ])->body !!}

    </x-card>

@endsection
