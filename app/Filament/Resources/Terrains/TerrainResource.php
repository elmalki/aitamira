<?php

namespace App\Filament\Resources\Terrains;

use App\Filament\Resources\Terrains\Pages\CreateTerrain;
use App\Filament\Resources\Terrains\Pages\EditTerrain;
use App\Filament\Resources\Terrains\Pages\ListTerrains;
use App\Filament\Resources\Terrains\Schemas\TerrainForm;
use App\Filament\Resources\Terrains\Tables\TerrainsTable;
use App\Models\Terrain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TerrainResource extends Resource
{
    protected static ?string $model = Terrain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeEuropeAfrica;

    protected static ?string $recordTitleAttribute = 'titre_foncier';

    public static function form(Schema $schema): Schema
    {
        return TerrainForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TerrainsTable::configure($table);
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
            'index' => ListTerrains::route('/'),
            'create' => CreateTerrain::route('/create'),
            'edit' => EditTerrain::route('/{record}/edit'),
        ];
    }
}
