@extends('layouts.default')

@section('content')

    <div class="flex-none w-full">

        @foreach($posts as $post)

            <x-card margin>

                <div class="flex justify-between items-center">
                    {{--#tags--}}
                </div>

                <div>
                    <a
                        class="font-semibold text-2xl text-{{ accent() }}-700 hover:underline"
                        href="{{ routeIfExists('blog', ['slug' => $post->slug]) }}"
                    >{{ $post->title }}</a>
                    <div>
                        <div class="leading-5 text-sm mt-0.5">
                            <time class="font-normal text-gray-500">
                                {{ $post->published_at_readable }} Uhr
                            </time>
                            <span class="text-xs text-gray-500">
                                ({{ $post->published_at->diffForHumans() }})
                            </span>
                        </div>
                        <div class="text-xs text-gray-500 mt-0.5 mb-7">
                            {{ readTime($post->body) }}
                        </div>
                    </div>

                    <div class="mt-2 text-gray-600">
                        <p>
                            {!! nl2br($post->body) !!}
                        </p>

                        @if ($slug)
                            <a
                                class="bg-{{ accent() }}-600 focus:outline-none hover:bg-{{ accent() }}-500 inline-block mt-7 px-5 py-2 relative rounded-md tracking-wide text-white"
                                href="{{ routeIfExists('blog') }}"
                            >
                                <ripple contain></ripple>
                                Zurück zum Blog
                            </a>
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
