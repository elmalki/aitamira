<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TaxPayer extends Model
{
    use HasTranslations;
    protected $fillable = ['identification','phone','first_name','last_name','id','address'];
    protected $appends = ['full_name'];
    public array $translatable = ['first_name','last_name','address'];
    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
}
