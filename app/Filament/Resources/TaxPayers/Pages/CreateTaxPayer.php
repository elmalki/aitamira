<?php

namespace App\Filament\Resources\TaxPayers\Pages;

use App\Filament\Resources\TaxPayers\TaxPayerResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateTaxPayer extends CreateRecord
{
    use Translatable;
    protected static string $resource = TaxPayerResource::class;
    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }
}
