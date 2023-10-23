<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'row';
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(RowValue::class, 'row_id', 'id');
    }
}
