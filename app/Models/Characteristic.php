<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'characteristic';
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(CharacteristicValue::class, 'characteristic_id', 'id');
    }
}
