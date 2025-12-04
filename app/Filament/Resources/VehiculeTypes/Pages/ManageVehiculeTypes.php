<?php

namespace App\Filament\Resources\VehiculeTypes\Pages;

use App\Filament\Resources\VehiculeTypes\VehiculeTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ManageRecords\Concerns\Translatable;

class ManageVehiculeTypes extends ManageRecords
{
    use Translatable;
    protected static string $resource = VehiculeTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}
