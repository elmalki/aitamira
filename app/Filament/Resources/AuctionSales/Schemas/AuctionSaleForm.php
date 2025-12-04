<?php

namespace App\Filament\Resources\AuctionSales\Schemas;

use App\Models\AuctionGroup;
use App\Models\ImpoundedVehicule;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class AuctionSaleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sale_receipt_number'),
                TextInput::make('sale_amount'),
                TextInput::make('sale_percentage')
                    ->suffix('%'),
                TextInput::make('sale_receipt_scan_url'),
                Select::make('impounded_vehicule_id')
                ->options(ImpoundedVehicule::all()->pluck('licence_plate','id'))
                ->searchable(),
                Select::make('auction_group')
                    ->options(AuctionGroup::all()->pluck('number','id'))
                ->searchable(),
            ]);
    }
}
