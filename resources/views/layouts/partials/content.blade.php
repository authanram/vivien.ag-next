@php($hasSidebar = (bool)trim($__env->yieldContent('sidebar')))

<x-container class="relative z-10">
    <div class="hidden md:block">
        <x-design-images/>
    </div>
    <x-content-indent class="lg:flex relative">
        <main class="lg:flex lg:self-stretch {{ ($hasSidebar ? 'lg:w-1/2' : 'w-full') }}">
            @stack('content')
        </main>
        @if ($hasSidebar)
            <div class="lg:flex lg:pl-10 lg:self-stretch lg:w-1/2">
                @stack('sidebar')
            </div>
        @endif
    </x-content-indent>
</x-container>
