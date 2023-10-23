<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowValue extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'row_value';
    public $timestamps = false;

    public function row()
    {
        return $this->belongsTo(Row::class, 'row_id');
    }
}
