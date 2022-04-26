@props(['sidebar' => null])

@php($hasSidebar = ($sidebar && trim($sidebar) !== ''))

<x-content-indent>
    <div class="relative">
        <div class="lg:flex">
            <main class="lg:flex lg:self-stretch {{ $hasSidebar ? 'lg:w-1/2' : 'w-full' }}">
                {{ $slot }}
            </main>
            @if ($hasSidebar)
                <div class="lg:flex lg:pl-10 lg:self-stretch lg:w-1/2">
                    {{ $sidebar }}
                </div>
            @endif
        </div>
    </div>
</x-content-indent>
