<?php

namespace App\Filament\Resources\Depositors\Pages;

use App\Filament\Resources\Depositors\DepositorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ManageRecords\Concerns\Translatable;

class ManageDepositors extends ManageRecords
{
    use Translatable;
    protected static string $resource = DepositorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),

            CreateAction::make(),
        ];
    }
}
