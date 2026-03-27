<?php

namespace App\Filament\Resources\EventAttendees\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EventAttendeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                Select::make('event_id')
                    ->relationship('event', 'id')
                    ->required(),
                TextInput::make('salutation')
                    ->required()
                    ->numeric(),
                Textarea::make('firstname')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('surname')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('phone')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('email')
                    ->label('Email address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('attendance')
                    ->required()
                    ->numeric()
                    ->default(1),
                Textarea::make('message')
                    ->columnSpanFull(),
                TextInput::make('created_by')
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric(),
                TextInput::make('deleted_by')
                    ->numeric(),
            ]);
    }
}
