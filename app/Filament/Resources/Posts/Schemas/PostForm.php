<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    Textarea::make('title')
                        ->label(__('Title'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('slug')
                        ->label(__('Slug'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('body')
                        ->label(__('Body'))
                        ->required()
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
