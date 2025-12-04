<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VehiculeType extends Model
{
    use HasTranslations;
    protected $fillable = ['name','daily_rate'];
    public array $translatable = ['name'];
}
