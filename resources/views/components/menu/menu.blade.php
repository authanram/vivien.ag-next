<nav {{ $attributes->merge(['class' => 'flex h-full items-center w-full']) }}>
    @foreach (Site::menus()->main() as $menuItem)
        <x-dynamic-component :component="$itemComponent" :model="$menuItem" />
    @endforeach
</nav>
