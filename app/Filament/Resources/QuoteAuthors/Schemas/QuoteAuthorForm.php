<?php

namespace App\Filament\Resources\QuoteAuthors\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuoteAuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    Textarea::make('name')
                        ->label(__('Name'))
                        ->columnSpanFull(),
                    Textarea::make('occupation')
                        ->label(__('Occupation'))
                        ->columnSpanFull(),
                    Textarea::make('url')
                        ->label(__('URL'))
                        ->columnSpanFull(),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
