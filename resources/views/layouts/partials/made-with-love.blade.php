<div class="h-14 md:h-9 lg:h-8"></div>

<div class="absolute bg-opacity-85 bg-white bottom-0 left-0 right-0 z-10">

    <x-container>

        <div class="md:text-right py-1 px-1 relative text-gray-500 text-xs">

            <div class="flex flex-col items-center justify-center lg:flex-row lg:justify-between lg:py-1 pb-2">

                <div class="flex items-center pb-2">
                    @include('layouts.partials.user-navigation')
                </div>

                <div v-cloak>

                    Made with

                    <ui-tooltip :nudge="0">

                        <span slot="tooltip">
                            For the world's
                            <span class="md:block">
                                <span class="font-medium">best mom</span>!!
                                <span
                                    class="text-red-500"
                                    style="font-size:.65rem"
                                >❤ ❤</span>
                            </span>
                        </span>

                        <span
                            class="text-red-500"
                            style="font-size:.65rem"
                        >❤</span>

                    </ui-tooltip>

                    and <a href="http://laravel.com" target="_blank" class="text-{{ accent() }}-600 hover:text-{{ accent() }}-500 hover:underline">Laravel</a>

                </div>

            </div>

        </div>

    </x-container>

</div>
