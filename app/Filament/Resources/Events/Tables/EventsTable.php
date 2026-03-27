<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('eventType.name')
                    ->label(__('Event Type'))
                    ->searchable(),
                TextColumn::make('eventLocation.name')
                    ->label(__('Event Location'))
                    ->searchable(),
                TextColumn::make('date_from')
                    ->label(__('Date From'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('date_to')
                    ->label(__('Date To'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('maximum_attendees')
                    ->label(__('Max. Attendees'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('reserved_seats')
                    ->label(__('Reserved Seats'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price')
                    ->label(__('Price'))
                    ->money('EUR')
                    ->sortable(),
                TextColumn::make('catering')
                    ->label(__('Catering'))
                    ->searchable(),
                IconColumn::make('published')
                    ->label(__('Published'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label(__('Deleted At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_by')
                    ->label(__('Updated By'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_by')
                    ->label(__('Deleted By'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
