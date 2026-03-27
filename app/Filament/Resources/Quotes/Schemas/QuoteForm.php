<?php

namespace App\Filament\Resources\Quotes\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    TextInput::make('quote_author_id')
                        ->label(__('Author'))
                        ->required()
                        ->numeric(),
                    Textarea::make('body')
                        ->label(__('Quote'))
                        ->required()
                        ->columnSpanFull(),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
