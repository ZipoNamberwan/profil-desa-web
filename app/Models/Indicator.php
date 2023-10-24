<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'indicator';
    public $timestamps = false;

    public function row()
    {
        return $this->belongsTo(Row::class, 'row_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }
}
