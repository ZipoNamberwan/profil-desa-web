<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodValue extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'period_value';
    public $timestamps = false;

    public function row()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }
}
