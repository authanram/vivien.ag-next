<?php

namespace App\Filament\Resources\EventLocations\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EventLocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    Textarea::make('name')
                        ->label(__('Name'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull(),
                    Textarea::make('address')
                        ->label(__('Address'))
                        ->columnSpanFull(),
                    Textarea::make('url')
                        ->label(__('URL'))
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
