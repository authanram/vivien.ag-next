<?php

namespace App\Filament\Resources\Images\Widgets;

use App\Models\Image;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;

class ImageStripPreview extends Widget
{
    protected string $view = 'filament.resources.images.widgets.image-strip-preview';

    protected int|string|array $columnSpan = 'full';

    public ?int $currentImageId = null;

    /** @var array<string, mixed>|null */
    public ?array $liveData = null;

    #[On('preview-updated')]
    public function updatePreview(array $data = []): void
    {
        $this->liveData = $data;
    }

    public function getImages(): Collection
    {
        return Image::with(['imageCoordinates', 'media'])
            ->whereHas('imageCoordinates', fn ($q) => $q->where('active', true))
            ->get()
            ->sortBy(fn (Image $image) => $image->imageCoordinates?->order_column ?? 999);
    }
}
