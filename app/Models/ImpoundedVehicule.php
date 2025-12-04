<?php

namespace App\Models;

use App\ImpoundedVehiculeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImpoundedVehicule extends Model
{
    protected $fillable = ['licence_plate','condition','payment_date','payment_receipt_number','status','entry_date','leave_date','auction_date','auction_group_id','vehicule_type_id','depositor_id'];
    protected $casts = [
        'status' => ImpoundedVehiculeEnum::class,
    ];
    public function vehiculeType():BelongsTo{
        return $this->belongsTo(VehiculeType::class);
    }
    public function depositor():BelongsTo{
        return $this->belongsTo(Depositor::class);
    }
    public function auctionGroup():BelongsTo{
        return $this->belongsTo(AuctionGroup::class,'auction_group_id');
    }
}
