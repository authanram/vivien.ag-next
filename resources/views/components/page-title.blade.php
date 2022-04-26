@props(['caption' => null])

<x-container class="{{ $caption ? 'pb-2' : 'pb-1' }}">
    <div class="md:pl-10">
        <h1 class="font-semibold leading-tight pt-1 text-{{ accent() }}-600 text-2xl tracking-tight">
            {{ $slot }}
        </h1>
        @if($caption)
            <div class="mt-1 text-gray-500 text-sm">
                {{ $caption }}
            </div>
        @endif
    </div>
</x-container>
