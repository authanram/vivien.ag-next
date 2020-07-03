@extends('layouts.default')

@section('content')

    <x-card>

        <div class="lg:flex">

            <div class="lg:mb-0 lg:w-1/2 mb-8 w-full">

			    <p class="font-semibold leading-tight sm:text-2xl text-xl text-{{ accent() }}-600 tracking-tight">
    				Sybille Seuffer
				</p>

                <p class="mt-1 font-medium">
                    {{ attribute('profession-long') }}
                </p>

                <img
                    alt="Sybille Seuffer"
                    class="my-8 h-48 w-48 rounded-full"
                    src="{{ asset('images/sybille-seuffer.jpg') }}"
                >

                {!! content('c6a0904b-b3cc-42ca-b6ba-bf1438c27798', true)->body !!}

            </div>

            <div class="hidden md:block border-gray-200 border-t-2 mt-2 pt-10"></div>

            <div class="lg:w-1/2 w-full">

                <p class="font-semibold leading-tight sm:text-2xl text-xl text-{{ accent() }}-600 tracking-tight">
                    Über mich
                </p>

                <br>

                {!! content('ea4a4722-7a10-4f37-a800-9eda6e7f68d2', true, [
                    '<p>' => '<p class="mb-3">',
                ])->body !!}

            </div>

        </div>

        <div class="border-gray-200 border-t-2 mt-10 pt-10"></div>

        <div class="lg:flex">

            <div class="lg:mb-0 lg:w-1/2 mb-8 w-full">

                <h2 class="font-semibold leading-tight sm:text-2xl text-xl text-{{ accent() }}-600 tracking-tight">
                    Leistungen
                </h2>

                <div class="-mt-1">

                    {!! content('900c0a50-5287-415d-b54e-cf40b02d957a', true, [
                        '<li>' => '<li class="pt-2">',
                    ])->body !!}

                </div>

            </div>

            <div class="hidden md:block border-gray-200 border-t-2 mt-2 pt-10"></div>

            <div class="lg:w-1/2 w-full">

                <h2 class="font-semibold leading-tight sm:text-2xl pb-4 text-xl text-{{ accent() }}-600 tracking-tight">
                    Vorträge und Seminare
                </h2>

                {!! content('c7d93aa2-601b-4a43-9d15-b669cdb674f9', true, [
                    '<li>' => '<li class="ml-5 pt-2">',
                ])->body !!}

            </div>

        </div>

    </x-card>

@endsection
