<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drink extends Model
{
    protected $fillable  = ['n_dossier','etablissement','ca_estime','date_cessation','motif','tax_payer_id'];

    public function tax_payer():BelongsTo{
        return $this->belongsTo(TaxPayer::class);
    }

}
