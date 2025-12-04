<?php

namespace App\Filament\Resources\ImpoundedVehicules\Tables;

use App\ImpoundedVehiculeEnum;
use App\Models\Depositor;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ImpoundedVehiculesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('licence_plate')
                    ->label(__('app.licence_plate'))
                    ->searchable(),
                TextColumn::make('payment_receipt_number')
                    ->label(__('app.payment_receipt_number'))
                    ->searchable(),
                TextColumn::make('condition')
                    ->label(__('app.condition'))
                    ->searchable(),
                TextColumn::make('payment_date')
                    ->label(__('app.payment_date'))
                    ->date()
                    ->sortable(),
                TextColumn::make('entry_date')
                    ->label(__('app.entry_date'))
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('leave_date')
                    ->label(__('app.leave_date'))
                    ->date()
                    ->sortable(),

                TextColumn::make('auction_date')
                    ->label(__('app.auction_date'))
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('app.status'))
                    ->badge(),
                TextColumn::make('vehiculeType.name')
                    ->label(__('app.vehicule_type'))
                    ->sortable(),
                TextColumn::make('depositor.name')
                    ->label(__('app.depositor'))
                    ->sortable(),
                TextColumn::make('auctionGroup.number')
                    ->label(__('app.auction'))
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Statut du véhicule')
                    ->options(ImpoundedVehiculeEnum::class)
                    ->attribute('status')
                    ->searchable(),
                SelectFilter::make('depositor_id')
                    ->label(__('app.depositor'))
                    ->options(Depositor::all()->pluck('name','id'))
            ],FiltersLayout::AboveContentCollapsible)
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
