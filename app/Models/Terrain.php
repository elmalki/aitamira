<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Terrain extends Model
{
    protected $fillable = [
        'titre_foncier',
        'emplacement',
        'n_lot',
        'n_construction',
        'date_construction_emission',
        'date_construction_expiration',
        'statut_construction',
        'n_habiter',
        'date_habiter_emission',
        'surface',
        'zone_id',
        'tax_payer_id',
    ];

    public function zone():BelongsTo
    {
        return  $this->belongsTo(Zone::class);
    }

    public function taxPayer():BelongsTo
    {
        return $this->belongsTo(TaxPayer::class);
    }
}
