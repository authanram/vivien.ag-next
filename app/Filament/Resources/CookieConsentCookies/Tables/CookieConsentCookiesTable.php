<?php

namespace App\Filament\Resources\CookieConsentCookies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CookieConsentCookiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cookie_name')
                    ->label(__('Cookie Name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('cookieConsentProvider.name')
                    ->label(__('Cookie Provider'))
                    ->sortable(),
                TextColumn::make('cookie_category')
                    ->label(__('Cookie Category'))
                    ->sortable(),
                TextColumn::make('cookie_lifetime')
                    ->label(__('Cookie Lifetime'))
                    ->numeric()
                    ->sortable(),
                IconColumn::make('encrypted')
                    ->label(__('Encrypted'))
                    ->boolean(),
                IconColumn::make('required')
                    ->label(__('Required'))
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
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
