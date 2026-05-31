<?php

namespace App\Filament\Resources\EventAttendees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EventAttendeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('display_name')
                    ->label(__('Name'))
                    ->sortable(query: fn ($query, string $direction) => $query
                        ->orderBy('surname', $direction)
                        ->orderBy('firstname', $direction)
                    )
                    ->searchable(query: fn ($query, string $search) => $query
                        ->where('firstname', 'ilike', "%{$search}%")
                        ->orWhere('surname', 'ilike', "%{$search}%")
                    ),
                TextColumn::make('event.id')
                    ->label(__('Event'))
                    ->formatStateUsing(fn ($record): string => $record->event->display_name)
                    ->sortable(),
                TextColumn::make('attendance')
                    ->label(__('Attendance'))
                    ->numeric()
                    ->sortable(),
                IconColumn::make('confirmed')
                    ->label(__('Confirmed'))
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
