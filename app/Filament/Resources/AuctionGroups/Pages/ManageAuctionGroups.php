<?php

namespace App\Filament\Resources\AuctionGroups\Pages;

use App\Filament\Resources\AuctionGroups\AuctionGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAuctionGroups extends ManageRecords
{
    protected static string $resource = AuctionGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
