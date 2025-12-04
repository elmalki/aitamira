<?php

namespace App\Filament\Resources\ImpoundedVehicules\Schemas;

use App\ImpoundedVehiculeEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ImpoundedVehiculeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('app.impounded_vehicule.information')) // ou un texte simple
                ->schema([
                    TextInput::make('licence_plate')
                        ->label(__('app.licence_plate'))
                        ->required()
                        ->maxLength(20)
                        ->unique(ignoreRecord: true),

                    TextInput::make('payment_receipt_number')
                        ->label(__('app.payment_receipt_number'))
                        ->maxLength(50),

                    TextInput::make('condition')
                        ->label(__('app.condition'))
                        ->required()
                        ->maxLength(255),
                ])
                    ->columns(3)
                ->columnSpanFull(),

                Section::make(__('app.impounded_vehicule.dates'))
                    ->schema([
                        DatePicker::make('payment_date')
                            ->label(__('app.payment_date'))
                            ->nullable(),

                        DatePicker::make('entry_date')
                            ->label(__('app.entry_date'))
                            ->required(),

                        DatePicker::make('leave_date')
                            ->label(__('app.leave_date'))
                            ->nullable(),

                        DatePicker::make('auction_date')
                            ->label(__('app.auction_date'))
                            ->nullable(),
                    ])
                    ->columns(2),

                Section::make(__('app.impounded_vehicule.status_and_relations'))
                    ->schema([
                        Select::make('status')
                            ->label(__('app.status'))
                            ->options(ImpoundedVehiculeEnum::class) // si ton enum est compatible Filament
                            ->enum(ImpoundedVehiculeEnum::class)    // pour la cast sur le modèle
                            ->required()
                            ->native(false),

                        Select::make('vehicule_type_id')
                            ->label(__('app.vehicule_type'))
                            ->relationship('vehiculeType', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('depositor_id')
                            ->label(__('app.depositor'))
                            ->relationship('depositor', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('auction_group_id')
                            ->label(__('app.auction'))
                            ->relationship('auctionGroup', 'number')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                    ])
                    ->columns(2),
            ]);
    }
}
