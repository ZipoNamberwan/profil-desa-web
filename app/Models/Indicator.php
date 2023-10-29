<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'indicator';

    public function row()
    {
        return $this->belongsTo(Row::class, 'row_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
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

    public function getCreated()
    {
        $date = $this->created_at;
        return date('d F Y', strtotime($date));
    }

    public function getYears()
    {
        $yearsArray = [];
        foreach (Year::all()->sortBy('id', SORT_NATURAL)->values() as $year) {
            $numdata = Data::where('code', 'like', $this->code . '%' . $year->code)->get()->count();
            if ($numdata > 0) {
                $yearsArray[] = $year->name;
            }
        }

        if (count($yearsArray) == 0) {
            return '-';
        } else if (count($yearsArray) == 1) {
            return $yearsArray[0];
        } else {
            return $yearsArray[0] . ' - ' . end($yearsArray);
        }
    }
}
