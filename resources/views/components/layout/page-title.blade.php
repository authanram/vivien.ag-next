@props(['caption' => null])

<x-card class="bg-opacity-95 mb-5 md:border-b-2 md:border-gray-100 md:mb-10 md:pb-1 pt-2 z-20">
    <x-layout.container class="{{ $caption ? 'pb-2' : 'pb-1' }}">
        <div class="md:pl-10">
            <h1 class="font-semibold leading-tight pt-1 text-{{ util()->accent() }}-600 text-2xl tracking-tight">
                {{ $slot }}
            </h1>
            @if($caption)
                <div class="mt-1 text-gray-500 text-sm">
                    {{ $caption }}
                </div>
            @endif
        </div>
    </x-layout.container>
</x-card>
