@extends('layouts.default')

@section('content')

    <div class="flex-none w-full">

        @foreach($posts as $post)

            <x-card margin>

                <div class="flex justify-between items-center">
                    {{--#tags--}}
                </div>

                <div class="mt-2">
                    <a
                        class="font-semibold text-2xl text-{{ accent() }}-700"
                    >
                        {{ $post->title }}
                    </a>
                    <span class="text-xs text-gray-500">
                        {{ readTime($post->body) }}
                    </span>
                    <div class="leading-5 text-sm">
                        <time class="font-normal">
                            {{ $post->published_at_readable }} Uhr
                        </time>
                        <span class="text-xs text-gray-500">
                            ({{ $post->published_at->diffForHumans() }})
                        </span>
                    </div>

                    <div class="mt-2 text-gray-600">
                        @if ($slug)
                            <div class="mb-5">
                                {!! nl2br($post->body) !!}
                            </div>

                            <a
                                class="bg-{{ accent() }}-600 focus:outline-none hover:bg-{{ accent() }}-500 inline-block px-5 py-2 rounded-md tracking-wide text-white"
                                href="{{ routeIfExists('blog') }}"
                            >
                                Zurück zum Blog
                            </a>
                        @else
                            @if(count(words($post->body)) > 50)
                                <div class="mb-5">
                                    {!! truncateWords(nl2br($post->body)) !!}
                                </div>

                                <div>
                                    <a
                                        class="bg-{{ accent() }}-600 focus:outline-none hover:bg-{{ accent() }}-500 inline-block px-5 py-2 rounded-md tracking-wide text-white"
                                        href="{{ routeIfExists('blog', ['slug' => $post->slug]) }}"
                                    >
                                        Weiterlesen
                                    </a>
                                </div>
                            @else
                                {!! truncateWords(nl2br($post->body)) !!}
                            @endif
                        @endif
                    </div>
                </div>

                {{--<div class="flex justify-between items-center mt-4">--}}

                {{--    <div>--}}
                {{--        <a class="text-{{ accent() }}-600 hover:underline mr-5" href="#">Weiterlesen</a>--}}
                {{--        <a class="hover:underline mr-5" href="#">Share</a>--}}
                {{--    </div>--}}

                {{--    <div>--}}
                {{--        <a class="flex items-center" href="#">--}}
                {{--            <div class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-{{ accent() }}-400 mr-4">--}}
                {{--                <span class="text-md font-medium leading-none text-white">TW</span>--}}
                {{--            </div>--}}
                {{--            <h1 class="text-gray-700 font-medium">Foo Bar</h1>--}}
                {{--        </a>--}}
                {{--    </div>--}}

                {{--</div>--}}

            </x-card>

        @endforeach

    </div>

@endsection
