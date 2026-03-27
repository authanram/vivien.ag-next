<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    TextInput::make('value')
                        ->label(__('Value'))
                        ->required(),
                    TextInput::make('color')
                        ->label(__('Color'))
                        ->required(),
                ]),
            ]);
    }
}
