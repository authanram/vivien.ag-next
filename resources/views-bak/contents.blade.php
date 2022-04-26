@php /** @var \App\Content[] $contents */ @endphp

@extends('layouts.default')

@section('caption')

    @foreach($contents as $content)

        @if(!empty(trim($content->getAttribute('caption'))))

            {!! parsedown(trim($content->getAttribute('caption'))) !!}

        @endif

    @endforeach

@endsection

@section('content')

    <div class="w-full">

        @foreach($contents as $content)

            <x-card>

                {!! parsedown($content->getAttribute('body')) !!}

            </x-card>

        @endforeach

    </div>

@endsection
