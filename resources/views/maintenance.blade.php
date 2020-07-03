@extends('layouts.default')

@section('content')

    <div class="container relative mx-auto">

        <div class="flex h-screen md:items-center md:justify-center pb-20 text-gray-700">

            <div class="p-6 w-full md:w-auto">
                <div class="mb-4 md:mb-12 uppercase text-sm">
                    @if(!empty(config('env.APP_PHONE')))
                        <a href="tel:{{ config('env.APP_PHONE') }}" class="active:bg-pink-800 bg-pink-800 block button focus:bg-pink-800 hover:bg-pink-700 leading-tight mb-4 md:inline md:mr-3 md:px-5 md:py-4 md:text-lg no-underline px-4 py-3 rounded-lg shadow text-white xl:px-4 xl:py-3 xl:text-base">
                            {{ config('env.APP_PHONE') }}
                        </a>
                    @endif
                    @if(!empty(config('env.APP_MAIL')))
                        <a href="mailto:{{ config('env.APP_MAIL') }}" class="active:bg-white bg-white block button focus:bg-white hover:bg-gray-200 leading-tight md:inline md:px-5 md:py-4 md:text-lg no-underline px-4 py-3 rounded-lg shadow text-gray-800 xl:px-4 xl:py-3 xl:text-base">
                            {{ config('env.APP_MAIL') }}
                        </a>
                    @endif
                </div>

                @if(!empty(config('env.APP_DOMAIN')))
                    <div class="bg-gray-100 bg-white leading-tight mb-4 md:mb-8 md:px-5 md:py-4 md:text-lg px-4 py-3 rounded-lg shadow text-center xl:px-8 xl:py-5 xl:text-base">
                        <div class="font-hairline md:text-6xl px-4 py-5 sm:p-6 text-3xl">
                            <span class="font-medium">{{ config('env.APP_DOMAIN') }}</span><span class="font-hairline md:text-3xl whitespace-no-wrap">{{ config('env.APP_DOMAIN_EXTENSION') }}</span>
                        </div>
                    </div>
                @endif

                <div class="text-right mb-8">
                    <span class="text-gray-500">In Kürze wieder zu erreichen.</span>
                </div>

            </div>
        </div>

    </div>

@endsection
