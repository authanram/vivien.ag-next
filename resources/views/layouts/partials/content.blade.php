<x-container>
    <div class="hidden md:block">
        <x-design-images/>
    </div>
    <x-content>
        @stack('content')
        <x-slot:sidebar>@stack('sidebar')</x-slot:sidebar>
    </x-content>
</x-container>
