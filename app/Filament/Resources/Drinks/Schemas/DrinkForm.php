<?php

namespace App\Filament\Resources\Drinks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DrinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2) // 3 columns
                ->schema([
                    TextInput::make('n_dossier')
                        ->required(),
                    TextInput::make('etablissement'),
                    TextInput::make('ca_estime')
                        ->numeric(),
                    Select::make('tax_payer_id')
                        ->label('Contribuable')
                        ->relationship('tax_payer', 'identification')
                        ->required(),
                ])->columnSpanFull(),
                Section::make('Cessation')
            ->schema([
                Grid::make(2) // 3 columns
                ->schema([
                DatePicker::make('date_cessation')
                    ->label('date_cessation'),
                TextInput::make('motif')
                    ])
            ])->columnSpanFull()

            ]);
    }
}
