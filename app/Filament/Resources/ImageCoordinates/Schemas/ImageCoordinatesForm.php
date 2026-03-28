<?php

namespace App\Filament\Resources\ImageCoordinates\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Livewire\Component;

class ImageCoordinatesForm
{
    public static function configure(Schema $schema): Schema
    {
        $dispatchPreview = function (Component $livewire): void {
            $data = $livewire->data;

            $livewire->dispatch('preview-updated', data: [
                'top' => $data['top'] ?? 0,
                'left' => $data['left'] ?? 0,
                'height' => $data['height'] ?? 200,
                'rotate' => $data['rotate'] ?? 0,
                'rotate_x' => $data['rotate_x'] ?? 0,
                'rotate_y' => $data['rotate_y'] ?? 0,
                'perspective' => $data['perspective'] ?? 500,
                'zindex' => $data['zindex'] ?? 1,
                'position' => $data['position'] ?? 'left',
                'active' => $data['active'] ?? true,
            ]);
        };

        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    Select::make('image_id')
                        ->label(__('Image'))
                        ->relationship('image', 'title')
                        ->required()
                        ->columnSpanFull(),
                    Select::make('position')
                        ->label(__('Position'))
                        ->options([
                            'left' => __('Left'),
                            'right' => __('Right'),
                        ])
                        ->default('left')
                        ->live(debounce: 500)
                        ->afterStateUpdated($dispatchPreview),
                    Fieldset::make(__('Transformation'))
                        ->columnSpanFull()
                        ->columns(2)
                        ->schema([
                            Slider::make('top')
                                ->label(__('Top'))
                                ->range(minValue: 0, maxValue: 1000)
                                ->default(0)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('left')
                                ->label(__('Left'))
                                ->range(minValue: -250, maxValue: 0)
                                ->default(0)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('height')
                                ->label(__('Height'))
                                ->range(minValue: 50, maxValue: 300)
                                ->default(200)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('rotate')
                                ->label(__('Rotate'))
                                ->range(minValue: -10, maxValue: 10)
                                ->default(0)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('rotate_x')
                                ->label(__('Rotate (x)'))
                                ->range(minValue: -30, maxValue: 30)
                                ->default(0)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('rotate_y')
                                ->label(__('Rotate (y)'))
                                ->range(minValue: -30, maxValue: 30)
                                ->default(0)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('perspective')
                                ->label(__('Perspective'))
                                ->range(minValue: 0, maxValue: 1000)
                                ->default(500)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                            Slider::make('zindex')
                                ->label(__('Index (z)'))
                                ->range(minValue: 1, maxValue: 25)
                                ->default(1)
                                ->tooltips(RawJs::make('$value.toFixed(2)'))
                                ->live(debounce: 500)
                                ->afterStateUpdated($dispatchPreview),
                        ]),
                    Toggle::make('active')
                        ->label(__('Active'))
                        ->default(true)
                        ->columnSpanFull()
                        ->live(debounce: 500)
                        ->afterStateUpdated($dispatchPreview),
                ]),
            ]);
    }
}
