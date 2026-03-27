<?php

namespace App\Filament\Resources\EventTypes\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EventTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    TextInput::make('color')
                        ->label(__('Color'))
                        ->required(),
                    Textarea::make('name')
                        ->label(__('Name'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull(),
                    Textarea::make('tags')
                        ->label(__('Tags'))
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
