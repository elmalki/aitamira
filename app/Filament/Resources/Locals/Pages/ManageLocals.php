<?php

namespace App\Filament\Resources\Locals\Pages;

use App\Filament\Resources\Locals\LocalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLocals extends ManageRecords
{
    protected static string $resource = LocalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
