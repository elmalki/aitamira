<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Local extends Model
{
    protected $fillable = ['n_boutique','surface','secteur_id'];

    public function secteur():BelongsTo{
        return $this->belongsTo(Secteur::class);
    }
}
