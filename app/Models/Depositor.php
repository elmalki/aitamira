<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Depositor extends Model
{
    use HasTranslations;
    protected $fillable = ['name'];
    public array $translatable = ['name'];


}
