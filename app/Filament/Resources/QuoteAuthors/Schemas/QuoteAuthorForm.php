<?php

namespace App\Filament\Resources\QuoteAuthors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuoteAuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                Textarea::make('name')
                    ->columnSpanFull(),
                Textarea::make('occupation')
                    ->columnSpanFull(),
                Textarea::make('url')
                    ->columnSpanFull(),
                Toggle::make('published')
                    ->required(),
                TextInput::make('created_by')
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric(),
                TextInput::make('deleted_by')
                    ->numeric(),
            ]);
    }
}
