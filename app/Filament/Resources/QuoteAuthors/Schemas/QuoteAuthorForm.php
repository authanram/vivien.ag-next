<?php

namespace App\Filament\Resources\QuoteAuthors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QuoteAuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    TextInput::make('name')
                        ->label(__('Name'))
                        ->required(),
                    TextInput::make('occupation')
                        ->label(__('Occupation')),
                    TextInput::make('url')
                        ->label(__('URL'))
                        ->url()
                        ->columnSpanFull(),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
