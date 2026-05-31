<x-filament-widgets::widget>
    <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="fi-section-header px-6 py-4">
            <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                {{ __('Image Strip Preview') }}
            </h3>
        </div>
        <div class="fi-section-content px-6 pb-6">
            @php
                $images = $this->getImages();
                $containerHeight = 200;

                $items = [];
                foreach ($images as $image) {
                    $coords = $image->imageCoordinates;
                    $mediaUrl = $image->getFirstMediaUrl('image', 'thumb') ?: $image->getFirstMediaUrl('image');
                    $isCurrentImage = $image->id === $this->currentImageId;

                    if ($isCurrentImage && $this->liveData) {
                        $top = $this->liveData['top'] ?? $coords->top ?? 0;
                        $left = $this->liveData['left'] ?? $coords->left ?? 0;
                        $height = $this->liveData['height'] ?? $coords->height ?? 200;
                        $rotate = $this->liveData['rotate'] ?? $coords->rotate ?? 0;
                        $rotateX = $this->liveData['rotate_x'] ?? $coords->rotate_x ?? 0;
                        $rotateY = $this->liveData['rotate_y'] ?? $coords->rotate_y ?? 0;
                        $perspective = $this->liveData['perspective'] ?? $coords->perspective ?? 500;
                        $zindex = $this->liveData['zindex'] ?? $coords->zindex ?? 1;
                    } else {
                        $top = $coords->top ?? 0;
                        $left = $coords->left ?? 0;
                        $height = $coords->height ?? 200;
                        $rotate = $coords->rotate ?? 0;
                        $rotateX = $coords->rotate_x ?? 0;
                        $rotateY = $coords->rotate_y ?? 0;
                        $perspective = $coords->perspective ?? 500;
                        $zindex = $coords->zindex ?? 1;
                    }

                    $containerHeight = max($containerHeight, $top + $height + 20);

                    $items[] = compact('image', 'mediaUrl', 'isCurrentImage', 'top', 'left', 'height', 'rotate', 'rotateX', 'rotateY', 'perspective', 'zindex');
                }
            @endphp
            <div style="display: flex; justify-content: center; width: 100%;">
                <div style="position: relative; width: 250px; height: {{ $containerHeight }}px; padding: 1rem 0;">
                    @forelse($items as $item)
                        @if($item['mediaUrl'])
                            <img
                                wire:key="img-{{ $item['image']->id }}-{{ md5(json_encode([$item['top'], $item['left'], $item['height'], $item['rotate'], $item['rotateX'], $item['rotateY'], $item['perspective'], $item['zindex']])) }}"
                                src="{{ $item['mediaUrl'] }}"
                                alt="{{ $item['image']->title }}"
                                class="rounded-lg shadow-md {{ $item['isCurrentImage'] ? 'ring-2 ring-pink-500' : '' }}"
                                style="position: absolute; height: {{ $item['height'] }}px; width: auto; left: calc(50% + {{ $item['left'] }}px); top: {{ $item['top'] }}px; padding: 3px; background: white; transform: perspective({{ $item['perspective'] }}px) rotate({{ $item['rotate'] }}deg) rotateX({{ $item['rotateX'] }}deg) rotateY({{ $item['rotateY'] }}deg); z-index: {{ $item['zindex'] }};"
                            >
                        @endif
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('No images with coordinates found.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
