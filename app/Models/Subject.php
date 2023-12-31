<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'subject';
    public $timestamps = false;

    public function indicators()
    {
        return $this->hasMany(Indicator::class, 'subject_id', 'id');
    }
}
