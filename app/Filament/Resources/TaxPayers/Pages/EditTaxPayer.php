<?php

namespace App\Filament\Resources\TaxPayers\Pages;

use App\Filament\Resources\TaxPayers\TaxPayerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditTaxPayer extends EditRecord
{
    use Translatable;
    protected static string $resource = TaxPayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            DeleteAction::make(),
        ];
    }
}
