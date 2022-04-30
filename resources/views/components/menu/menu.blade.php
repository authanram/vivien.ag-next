<div class="h-16 shadow-lg sticky top-0 w-full z-10"></div>
<div {{ $attributes->merge(['class' => '-mt-16 bg-white border border-gray-100 md:mb-0 mx-auto relative self-stretch sticky top-0 w-full z-40']) }}>
    <div class="absolute border-gray-200 left-0 right-0 z-20" style="bottom: -1px; border-width: 3px;"></div>
    <x-container class="flex h-16 items-center relative z-20">
        <nav class="flex grow h-full items-center">
            <x-menu:main:item
                :model="Site::menus()->main()->get('welcome')"
                :active="false"
                color="pink"
            >
                <x-brand />
            </x-menu:main:item>
            @foreach (Site::menus()->main() as $menuItem)
                <x-menu:main:item :model="$menuItem" />
            @endforeach
        </nav>
    </x-container>
</div>
