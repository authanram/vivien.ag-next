<?php

namespace App\Filament\Resources\Images\Widgets;

use App\Models\Image;
use App\Models\ImageCoordinates;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;

class ImageStripPreview extends Widget
{
    protected string $view = 'filament.resources.images.widgets.image-strip-preview';

    protected int|string|array $columnSpan = 'full';

    /** The image strip entry being edited; null while a new entry is created. */
    public ?int $currentCoordinatesId = null;

    /** @var array<string, mixed>|null */
    public ?array $liveData = null;

    #[On('preview-updated')]
    public function updatePreview(array $data = []): void
    {
        $this->liveData = $data;
    }

    /** @return Collection<int, array<string, mixed>> */
    public function getItems(): Collection
    {
        $entries = ImageCoordinates::query()
            ->with('image.media')
            ->where(fn ($query) => $query
                ->where('active', true)
                ->when($this->currentCoordinatesId, fn ($query, int $id) => $query->orWhere('id', $id)))
            ->orderBy('order_column')
            ->get()
            ->map(fn (ImageCoordinates $entry): array => $this->toItem(
                $entry->image,
                $entry->only(['top', 'left', 'height', 'rotate', 'rotate_x', 'rotate_y', 'perspective', 'zindex', 'active']),
                $entry->id === $this->currentCoordinatesId,
            ));

        if ($this->liveData === null) {
            return $entries->filter(fn (array $item): bool => $item['active'])->values();
        }

        $liveImage = Image::with('media')->find($this->liveData['image_id'] ?? null);
        $liveItem = $this->toItem($liveImage, $this->liveData, true);

        $items = $this->currentCoordinatesId
            ? $entries->map(fn (array $item): array => $item['isCurrent'] ? $liveItem : $item)
            : $entries->push($liveItem);

        return $items->filter(fn (array $item): bool => $item['active'] && $item['mediaUrl'])->values();
    }

    /**
     * @param  array<string, mixed>  $coordinates
     * @return array<string, mixed>
     */
    private function toItem(?Image $image, array $coordinates, bool $isCurrent): array
    {
        return [
            'key' => $image?->id ?? 'none',
            'title' => $image?->title,
            'mediaUrl' => $image?->getFirstMediaUrl('image', 'thumb') ?: $image?->getFirstMediaUrl('image'),
            'isCurrent' => $isCurrent,
            'active' => (bool) ($coordinates['active'] ?? true),
            'top' => $coordinates['top'] ?? 0,
            'left' => $coordinates['left'] ?? 0,
            'height' => $coordinates['height'] ?? 200,
            'rotate' => $coordinates['rotate'] ?? 0,
            'rotateX' => $coordinates['rotate_x'] ?? 0,
            'rotateY' => $coordinates['rotate_y'] ?? 0,
            'perspective' => $coordinates['perspective'] ?? 500,
            'zindex' => $coordinates['zindex'] ?? 1,
        ];
    }
}
