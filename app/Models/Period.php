<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'period';
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(PeriodValue::class, 'period_id', 'id');
    }
}
