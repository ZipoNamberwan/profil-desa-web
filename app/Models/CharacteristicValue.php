<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicValue extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'characteristic_value';
    public $timestamps = false;

    public function row()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }
}
