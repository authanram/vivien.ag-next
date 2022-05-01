@php($hasSidebar = (bool)trim($__env->yieldContent('sidebar')))

<x-layout.container class="relative z-10">
    <x-layout.design-images class="hidden md:block" />
    <x-layout.content-indent>
        @stack('content')
    </x-layout.content-indent>
</x-layout.container>
