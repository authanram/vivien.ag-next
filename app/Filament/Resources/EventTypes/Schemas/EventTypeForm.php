<?php

namespace App\Filament\Resources\EventTypes\Schemas;

use App\Enums\Color;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    TextInput::make('name')
                        ->label(__('Name'))
                        ->required(),
                    Select::make('color')
                        ->label(__('Color'))
                        ->options(Color::toHtmlOptions())
                        ->allowHtml()
                        ->searchable()
                        ->required(),
                    Textarea::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
