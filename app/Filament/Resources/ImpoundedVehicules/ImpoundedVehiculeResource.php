<?php

namespace App\Filament\Resources\ImpoundedVehicules;

use App\Filament\Resources\ImpoundedVehicules\Pages\CreateImpoundedVehicule;
use App\Filament\Resources\ImpoundedVehicules\Pages\EditImpoundedVehicule;
use App\Filament\Resources\ImpoundedVehicules\Pages\ListImpoundedVehicules;
use App\Filament\Resources\ImpoundedVehicules\Schemas\ImpoundedVehiculeForm;
use App\Filament\Resources\ImpoundedVehicules\Tables\ImpoundedVehiculesTable;
use App\Models\ImpoundedVehicule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ImpoundedVehiculeResource extends Resource
{
    protected static ?string $model = ImpoundedVehicule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::LockClosed;

    protected static ?string $recordTitleAttribute = 'licence_plate';
    public static function getModelLabel(): string
    {
        return __('app.impounded_vehicule.label');
    }

    /**
     * @return string|null
     */
    public static function getPluralModelLabel(): string
    {
        if(app()->currentLocale()=='ar')
            return self::getModelLabel();
        return parent::getPluralModelLabel();
    }
    public static function form(Schema $schema): Schema
    {
        return ImpoundedVehiculeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImpoundedVehiculesTable::configure($table);
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
            'index' => ListImpoundedVehicules::route('/'),
            'create' => CreateImpoundedVehicule::route('/create'),
            'edit' => EditImpoundedVehicule::route('/{record}/edit'),
        ];
    }
}
