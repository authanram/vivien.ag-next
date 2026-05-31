<x-filament-panels::page>
    <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start;">
            <div>
                {{ $this->content }}
            </div>

            <div style="position: sticky; top: 5rem;">
                @livewire(\App\Filament\Resources\Images\Widgets\ImageStripPreview::class, [
                    'currentImageId' => $this->record->image_id,
                ])
            </div>
        </div>
    </div>
</x-filament-panels::page>
