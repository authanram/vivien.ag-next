<div class="lg:max-w-5xl mx-auto {{ $classAttributePadding ?? 'xl:px-10 md:pl-5 px-5' }} xl:max-w-screen-xl">
    <ui-menu
        route-name-current="{{ request()->route()->getName() }}"
        slug="{{ $slug ?? 'main' }}"
        @if(!empty($border))
            border
        @endif
    >
        <template
            slot="default"
            slot-scope="scope"
        >
            @if(trim($slot) && \Route::has('welcome'))

                <div class="inline-flex self-stretch">

                    <a
                        :class="scope.data.classAttribute('pink')"
                        href="{{ route('welcome') }}"
                        class="cursor-pointer inline-flex items-center relative self-stretch"
                    >

                        <ripple contain></ripple>

                        <span class="inline-block pr-2 pt-1">

                            {!! $slot !!}

                        </span>

                    </a>

                </div>

            @endif
        </template>
    </ui-menu>
</div>
{{--<ui-flyout></ui-flyout>--}}
