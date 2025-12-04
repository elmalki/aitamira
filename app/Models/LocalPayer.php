<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocalPayer extends Model
{
    protected $fillable = ['n_exploitation','start_date','end_date','tax_payer_id','local_id'];

    public function tax_payer():BelongsTo{
        return $this->belongsTo(TaxPayer::class);
    }

    public function local():BelongsTo
    {
        return $this->belongsTo(Local::class);
    }

}
