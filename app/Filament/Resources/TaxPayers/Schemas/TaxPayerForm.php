<?php

namespace App\Filament\Resources\TaxPayers\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaxPayerForm
{
    private const ID_REGEX = '/^[A-Za-z]{1,2}\d{1,6}$/';
    private const NAME_REGEX = '/^[\pL\pM\s\'\.\-]+$/u';
    private const PHONE_REGEX = '/^\+?[0-9\s\-().]{7,20}$/';

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('identification')
                    ->label(__('app.identification'))
                    ->required()
                    ->maxLength(8)
                    ->regex(self::ID_REGEX)
                    ->validationMessages([
                        'regex' => __('Please enter 1–2 letters followed by 1–6 digits.'),
                    ])
                    ->unique('tax_payers', 'identification', ignoreRecord: true)
                    ->dehydrateStateUsing(fn ($state) => strtoupper(trim((string) $state)))
                    ->placeholder('AA123456'),

                TextInput::make('first_name')
                    ->label(__('app.first_name'))
                    ->required()
                    ->maxLength(100)
                    ->regex(self::NAME_REGEX)
                    ->validationMessages([
                        'regex' => __('Only letters, spaces, apostrophes, dots, and hyphens are allowed.'),
                    ])
                    ->dehydrateStateUsing(fn ($state) => trim((string) $state)),

                TextInput::make('last_name')
                    ->label(__('app.last_name'))
                    ->required()
                    ->maxLength(100)
                    ->regex(self::NAME_REGEX)
                    ->validationMessages([
                        'regex' => __('Only letters, spaces, apostrophes, dots, and hyphens are allowed.'),
                    ])
                    ->dehydrateStateUsing(fn ($state) => trim((string) $state)),

                TextInput::make('phone')
                    ->label(__('app.phone'))
                    ->nullable()
                    ->maxLength(20)
                    ->regex(self::PHONE_REGEX)
                    ->validationMessages([
                        'regex' => __('Enter a valid phone number (digits, spaces, +, -, (), .).'),
                    ])
                    ->dehydrateStateUsing(fn ($state) => trim((string) $state)),

                Textarea::make('address')
                    ->label(__('app.address'))
                    ->nullable()
                    ->rows(3)
                    ->maxLength(1000)
                    ->dehydrateStateUsing(fn ($state) => trim((string) $state))
                    ->columnSpanFull(),
            ]);
    }
}
