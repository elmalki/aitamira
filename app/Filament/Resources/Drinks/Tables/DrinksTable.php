<?php

namespace App\Filament\Resources\Drinks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DrinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('n_dossier')
                    ->searchable(),
                TextColumn::make('etablissement')
                    ->searchable(),
                TextColumn::make('ca_estime')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tax_payer.identification')
                    ->label('Identification')
                    ->searchable(),
                TextColumn::make('tax_payer.full_name')
                    ->label('Contribualbe'),
                TextColumn::make('tax_payer.phone')
                    ->label('Téléphone'),
                TextColumn::make('tax_payer.identification')
                    ->label('Identification')
                ->searchable(),
                IconColumn::make('is_active')
                    ->state(fn ($record) => $record->date_cessation == null )
                ->boolean()
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->label('Statut'),
                TextColumn::make('date_cessation'),
                TextColumn::make('motif')
                    ->label('Motif de cessation')
            ])
            ->filters([
                //
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
