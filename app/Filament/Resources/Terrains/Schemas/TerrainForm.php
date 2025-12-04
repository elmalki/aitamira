<?php

namespace App\Filament\Resources\Terrains\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TerrainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informations foncières')
        ->schema([
           TextInput::make('titre_foncier')
                ->label('Titre foncier'),

           TextInput::make('emplacement')
                ->label('Emplacement')
                ->required(),

           TextInput::make('surface')
                ->label('Surface (m²)')
                ->numeric()
                ->minValue(1)
                ->required(),
        ])
        ->columns(3),
                Section::make('Affectations')
                    ->schema([
                        Select::make('zone_id')
                            ->label('Zone')
                            ->relationship('zone', 'name') // change 'name' en 'nom' si besoin
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('tax_payer_id')
                            ->label('Contribuable')
                            ->relationship('taxPayer', 'identification') // adapte au bon champ
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Construction')
                    ->schema([
                       TextInput::make('n_lot')
                            ->label('N° lot'),

                       TextInput::make('n_construction')
                            ->label('N° construction'),

                        DatePicker::make('date_construction_emission')
                            ->label('Date émission construction'),

                        DatePicker::make('date_construction_expiration')
                            ->label('Date expiration construction'),

                        Toggle::make('statut_construction')
                            ->label('Construction valide ?')
                            ->default(false),
                    ])
                    ->columns(2),

                Section::make('Habitation')
                    ->schema([
                       TextInput::make('n_habiter')
                            ->label('N° habitation'),

                        DatePicker::make('date_habiter_emission')
                            ->label('Date émission habitation'),
                    ])
                    ->columns(2) ,
            ]);
    }
}
