<?php

namespace App\Filament\Resources\EventAttendees\Schemas;

use App\Models\Event;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventAttendeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    Select::make('event_id')
                        ->label(__('Event'))
                        ->relationship('event', modifyQueryUsing: fn ($query) => $query->with('eventType'))
                        ->getOptionLabelFromRecordUsing(fn (Event $record) => "{$record->display_name}, {$record->date_from->format('d.m.Y - H:i')}")
                        ->required()
                        ->columnSpanFull(),
                    Select::make('salutation')
                        ->label(__('Salutation'))
                        ->options([
                            1 => __('Mr.'),
                            2 => __('Mrs.'),
                            3 => __('Diverse'),
                        ])
                        ->required(),
                    TextInput::make('attendance')
                        ->label(__('Attendance'))
                        ->required()
                        ->numeric()
                        ->default(1),
                    TextInput::make('firstname')
                        ->label(__('First Name'))
                        ->required(),
                    TextInput::make('surname')
                        ->label(__('Last Name'))
                        ->required(),
                    TextInput::make('phone')
                        ->label(__('Phone'))
                        ->required(),
                    TextInput::make('email')
                        ->label(__('Email Address'))
                        ->required(),
                    Textarea::make('message')
                        ->label(__('Message'))
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
