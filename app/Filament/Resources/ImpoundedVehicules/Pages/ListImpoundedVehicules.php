<?php

namespace App\Filament\Resources\ImpoundedVehicules\Pages;

use App\Filament\Resources\ImpoundedVehicules\ImpoundedVehiculeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImpoundedVehicules extends ListRecords
{
    protected static string $resource = ImpoundedVehiculeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
