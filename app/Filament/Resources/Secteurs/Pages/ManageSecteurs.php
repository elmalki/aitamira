<?php

namespace App\Filament\Resources\Secteurs\Pages;

use App\Filament\Resources\Secteurs\SecteurResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSecteurs extends ManageRecords
{
    protected static string $resource = SecteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
