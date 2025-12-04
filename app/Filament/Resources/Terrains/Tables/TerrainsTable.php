<?php

namespace App\Filament\Resources\Terrains\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
class TerrainsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre_foncier')
                    ->label('Titre foncier')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('emplacement')
                    ->label('Emplacement')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('surface')
                    ->label('Surface (m²)')
                    ->sortable(),

                TextColumn::make('n_lot')
                    ->label('Lot'),

                TextColumn::make('n_construction')
                    ->label('Construction'),

                ToggleColumn::make('statut_construction')
                    ->label('Construction valide')
                    ->sortable(),

                TextColumn::make('date_construction_emission')
                    ->label('Émission construction')
                    ->date()
                    ->sortable(),

                TextColumn::make('date_construction_expiration')
                    ->label('Expiration construction')
                    ->date()
                    ->sortable(),

                TextColumn::make('zone.name')
                    ->label('Zone')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('taxPayer.name')
                    ->label('Contribuable')
                    ->sortable()
                    ->searchable(),

                // Si tu ajoutes la colonne archive
                // BooleanColumn::make('archive')->label('Archivé'),
            ])

            ->filters([
                // Filtrer par statut de la construction
                Filter::make('construction_valide')
                    ->label('Construction validée')
                    ->query(fn (Builder $query) => $query->where('statut_construction', true)),

                // Filtrer les expirations passées
                Filter::make('expired')
                    ->label('Construction expirée')
                    ->query(fn (Builder $query) =>
                    $query->whereDate('date_construction_expiration', '<', now())
                    )
                    ->toggle(),

                // Filtrer les éléments archivés si tu utilises archive
                // TernaryFilter::make('archive')->label('Archivé'),
            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(), // peut devenir "archiver" si tu ne delete jamais
                ]),
            ]);

    }
}
