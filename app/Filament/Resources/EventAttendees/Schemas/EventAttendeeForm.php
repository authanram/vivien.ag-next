<?php

namespace App\Filament\Resources\EventAttendees\Schemas;

use Filament\Schemas\Components\Section;
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
                Section::make()->columnSpanFull()->schema([
                    Select::make('event_id')
                        ->label(__('Event'))
                        ->relationship('event', 'id')
                        ->required(),
                    TextInput::make('salutation')
                        ->label(__('Salutation'))
                        ->required()
                        ->numeric(),
                    Textarea::make('firstname')
                        ->label(__('First Name'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('surname')
                        ->label(__('Last Name'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('phone')
                        ->label(__('Phone'))
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('email')
                        ->label(__('Email Address'))
                        ->required()
                        ->columnSpanFull(),
                    TextInput::make('attendance')
                        ->label(__('Attendance'))
                        ->required()
                        ->numeric()
                        ->default(1),
                    Textarea::make('message')
                        ->label(__('Message'))
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
