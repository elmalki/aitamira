<?php

namespace App\Filament\Resources\AuctionSales\Pages;

use App\Filament\Resources\AuctionSales\AuctionSaleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAuctionSale extends EditRecord
{
    protected static string $resource = AuctionSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
