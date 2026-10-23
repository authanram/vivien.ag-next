<x-filament-widgets::widget>
    <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="fi-section-header px-6 py-4">
            <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                {{ __('Image Strip Preview') }}
            </h3>
        </div>
        <div class="fi-section-content px-6 pb-6">
            @php
                $items = $this->getItems();
                $containerHeight = $items->reduce(fn (int $height, array $item) => max($height, (int) ceil($item['top'] + $item['height'] + 20)), 200);
            @endphp
            {{-- Coordinates are offsets from the content edge on the website, so center the strip by its rendered bounds. --}}
            <div
                x-data="{
                    shift: 0,
                    center() {
                        const images = [...$refs.stage.querySelectorAll('img')].map((image) => image.getBoundingClientRect());

                        if (! images.length) {
                            return;
                        }

                        const frame = $el.getBoundingClientRect();
                        const left = Math.min(...images.map((rect) => rect.left));
                        const right = Math.max(...images.map((rect) => rect.right));

                        this.shift += frame.left + frame.width / 2 - (left + right) / 2;
                    },
                }"
                x-init="
                    $nextTick(() => center());
                    $wire.$watch('liveData', () => setTimeout(() => center()));
                "
                x-on:resize.window.debounce.150ms="center()"
                style="display: flex; justify-content: center; width: 100%;"
            >
                <div
                    x-ref="stage"
                    :style="{ transform: `translateX(${shift}px)` }"
                    style="position: relative; width: 250px; height: {{ $containerHeight }}px; padding: 1rem 0;"
                >
                    @forelse($items as $item)
                        <img
                            wire:key="img-{{ $item['key'] }}-{{ md5(json_encode($item)) }}"
                            src="{{ $item['mediaUrl'] }}"
                            x-on:load="center()"
                            alt="{{ $item['title'] }}"
                            class="rounded-lg shadow-md {{ $item['isCurrent'] ? 'ring-2 ring-pink-500' : '' }}"
                            style="position: absolute; height: {{ $item['height'] }}px; width: auto; left: calc(50% + {{ $item['left'] }}px); top: {{ $item['top'] }}px; padding: 3px; background: white; transform: perspective({{ $item['perspective'] }}px) rotate({{ $item['rotate'] }}deg) rotateX({{ $item['rotateX'] }}deg) rotateY({{ $item['rotateY'] }}deg); z-index: {{ $item['zindex'] }};"
                        >
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('No images with coordinates found.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
