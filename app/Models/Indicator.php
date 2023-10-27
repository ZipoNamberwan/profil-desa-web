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

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }

    public function getLastUpdated()
    {
        $date = Data::where('code', 'like', $this->code . '%')->max('updated_at');
        if ($date == null) {
            return '-';
        }
        return date('d F Y', strtotime($date));
    }
}
