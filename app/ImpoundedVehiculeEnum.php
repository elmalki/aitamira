<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum ImpoundedVehiculeEnum:string implements HasLabel, HasColor
{
    case IMPOUNDED_VEHICULE   = 'IMPOUNDED_VEHICULE';
    case EXITED_VEHICULE      = 'EXITED_VEHICULE';
    case AUCTION_VEHICULE     = 'AUCTION_VEHICULE';
    case PENDING_EXIT_VEHICULE = 'PENDING_EXIT_VEHICULE';

    public function getLabel(): string|Htmlable|null
    {
        return __('app.status_value.'.$this->name);
    }

    public function getColor(): string|array|null
    {
        return match($this) {
             self::EXITED_VEHICULE => 'danger',
             self::AUCTION_VEHICULE => 'warning',
             self::PENDING_EXIT_VEHICULE => 'info',
             self::IMPOUNDED_VEHICULE => 'primary'
        };
    }
}
