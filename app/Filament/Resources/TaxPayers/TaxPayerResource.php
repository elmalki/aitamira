<?php

namespace App\Filament\Resources\TaxPayers;

use App\Filament\Resources\TaxPayers\Pages\CreateTaxPayer;
use App\Filament\Resources\TaxPayers\Pages\EditTaxPayer;
use App\Filament\Resources\TaxPayers\Pages\ListTaxPayers;
use App\Filament\Resources\TaxPayers\Schemas\TaxPayerForm;
use App\Filament\Resources\TaxPayers\Tables\TaxPayersTable;
use App\Models\TaxPayer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class TaxPayerResource extends Resource
{
    use Translatable;
    protected static ?string $model = TaxPayer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $recordTitleAttribute = 'full_name';
    public static function getModelLabel(): string
    {
        return __('app.tax_payer');
    }
    public static function getPluralLabel(): ?string
    {
        return __('app.tax_payers');
    }

    public static function form(Schema $schema): Schema
    {
        return TaxPayerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TaxPayersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTaxPayers::route('/'),
            'create' => CreateTaxPayer::route('/create'),
            'edit' => EditTaxPayer::route('/{record}/edit'),
        ];
    }
}
