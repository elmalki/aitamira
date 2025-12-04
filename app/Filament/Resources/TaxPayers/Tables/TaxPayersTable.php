<?php

namespace App\Filament\Resources\TaxPayers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TaxPayersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('identification')
                    ->label(__('app.identification'))
                    ->forceSearchCaseInsensitive()
                    ->searchable(),
                TextColumn::make('first_name')
                    ->label(__('app.first_name')),
                TextColumn::make('last_name')
                    ->label(__('app.last_name'))
                    ->forceSearchCaseInsensitive()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('app.phone')),
                TextColumn::make('address')
                    ->label(__('app.address')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
