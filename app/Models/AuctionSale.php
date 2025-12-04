<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AuctionSale extends Model
{
    protected $fillable = ['sale_receipt_number','sale_amount','sale_percentage','sale_receipt_scan_url','impounded_vehicule_id','auction_group_id'];

    public function impounded_vehicule():HasOne
    {
        return $this->hasOne(ImpoundedVehicule::class);
    }
    public function auction_group():HasOne
    {
        return $this->hasOne(ImpoundedVehicule::class);
    }
}
