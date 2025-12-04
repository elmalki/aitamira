<?php

namespace App\Filament\Resources\AuctionSales\Pages;

use App\Filament\Resources\AuctionSales\AuctionSaleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAuctionSales extends ListRecords
{
    protected static string $resource = AuctionSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
