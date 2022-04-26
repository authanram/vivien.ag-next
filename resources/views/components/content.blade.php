@props(['sidebar' => null])
@php($hasSidebar = ($sidebar && trim($sidebar) !== ''))

<div class="relative">
    <div class="lg:flex">
        <main class="lg:flex lg:self-stretch {{ $hasSidebar ? 'lg:w-1/2' : 'w-full' }}">
            {{ $slot }}
        </main>
        @if ($hasSidebar)
            <div class="lg:flex lg:self-stretch lg:pl-10 lg:w-1/2">
                {{ $sidebar }}
            </div>
        @endif
    </div>
</div>
