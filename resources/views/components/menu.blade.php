@php($items = util()->data()->menus()->get('main')->menuItems)
<div class="h-16 shadow-lg sticky top-0 w-full z-10"></div>
<div {{ $attributes->merge(['class' => '-mt-16 bg-white border border-gray-100 md:mb-0 mx-auto relative self-stretch sticky top-0 w-full z-40']) }}>
    <div class="absolute border-gray-200 left-0 right-0 z-20" style="bottom: -1px; border-width: 3px;"></div>
    <x-container class="flex h-16 items-center relative z-20">
        <nav class="flex grow h-full items-center">
            <x-menu-item href="{{ util()->route('welcome') }}" class="w-[218px]" color="pink">
                <x-brand />
            </x-menu-item>
            @foreach ($items as $item)
                @php($route = $item->route->route)
                <x-menu-item
                    :color="$item->color->color"
                    :href="util()->route($route)"
                    :active="request()->route()->getName() === $route"
                >{{ $item->label }}</x-menu-item>
            @endforeach
        </nav>
    </x-container>
</div>
{{--bg-opacity-95 md:border-b-2 md:border-gray-100 mb-5 md:mb-10 md:pb-1 pt-2 z-20 bg-white margin mx-auto relative self-stretch w-full--}}
