<?php

namespace App\Filament\Resources\AuctionSales;

use App\Filament\Resources\AuctionSales\Pages\CreateAuctionSale;
use App\Filament\Resources\AuctionSales\Pages\EditAuctionSale;
use App\Filament\Resources\AuctionSales\Pages\ListAuctionSales;
use App\Filament\Resources\AuctionSales\Schemas\AuctionSaleForm;
use App\Filament\Resources\AuctionSales\Tables\AuctionSalesTable;
use App\Models\AuctionSale;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AuctionSaleResource extends Resource
{
    protected static ?string $model = AuctionSale::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CurrencyDollar;

    protected static ?string $recordTitleAttribute = 'sale_receipt_number';

    public static function form(Schema $schema): Schema
    {
        return AuctionSaleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuctionSalesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAuctionSales::route('/'),
            'create' => CreateAuctionSale::route('/create'),
            'edit' => EditAuctionSale::route('/{record}/edit'),
        ];
    }
}
