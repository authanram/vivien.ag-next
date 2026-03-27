<?php

namespace App\Filament\Resources\ImageCoordinates\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ImageCoordinatesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    Select::make('image_id')
                        ->label(__('Image'))
                        ->relationship('image', 'name')
                        ->required(),
                    Textarea::make('coordinates')
                        ->label(__('Coordinates'))
                        ->required()
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
