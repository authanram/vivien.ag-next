<?php

namespace App\Filament\Resources\Images\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    TextInput::make('name')
                        ->label(__('Name')),
                    TextInput::make('description')
                        ->label(__('Description')),
                    TextInput::make('price')
                        ->label(__('Price'))
                        ->numeric()
                        ->prefix('€'),
                    TextInput::make('order_column')
                        ->label(__('Order'))
                        ->required()
                        ->numeric(),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
