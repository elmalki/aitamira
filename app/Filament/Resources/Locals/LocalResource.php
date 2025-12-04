<?php

namespace App\Filament\Resources\Locals;

use App\Filament\Resources\Locals\Pages\ManageLocals;
use App\Models\Local;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LocalResource extends Resource
{
    protected static ?string $model = Local::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShoppingCart;

    protected static ?string $recordTitleAttribute = 'n_boutique';

    public static function getModelLabel(): string
    {
        return 'Boutique';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('n_boutique')
                    ->required(),
                TextInput::make('surface')
                    ->required(),
                Select::make('secteur_id')
                    ->relationship('secteur', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('n_boutique')
            ->columns([
                TextColumn::make('n_boutique')
                    ->searchable(),
                TextColumn::make('surface')
                    ->searchable(),
                TextColumn::make('secteur.name')
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
            'index' => ManageLocals::route('/'),
        ];
    }
}
