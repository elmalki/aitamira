<?php

namespace App\Filament\Resources\VehiculeTypes;

use App\Filament\Resources\VehiculeTypes\Pages\ManageVehiculeTypes;
use App\Models\VehiculeType;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class VehiculeTypeResource extends Resource
{
    use Translatable;
    protected static ?string $model = VehiculeType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Truck;

    protected static ?string $recordTitleAttribute = 'name';
    public static function getModelLabel(): string
    {
        return __('app.vehicule_type');
    }
    public static function getPluralModelLabel(): string
    {
        if(app()->currentLocale()=='ar')
            return self::getModelLabel();
        return parent::getPluralModelLabel();
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('app.name'))
                    ->required(),
                TextInput::make('daily_rate')
                    ->label(__('app.daily_rate'))
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.name'))
                    ->searchable(),
                TextColumn::make('daily_rate')
                    ->label(__('app.daily_rate'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageVehiculeTypes::route('/'),
        ];
    }
}
