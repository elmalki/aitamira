<?php

namespace App\Filament\Resources\ImpoundedVehicules\Pages;

use App\Filament\Resources\ImpoundedVehicules\ImpoundedVehiculeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditImpoundedVehicule extends EditRecord
{
    protected static string $resource = ImpoundedVehiculeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
