<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Indicator;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $total_indicator = count(Indicator::all());
        $total_data = count(Data::all());

        return view('frontend/home', [
            'subjects' => $subjects,
            'total_indicator' => $total_indicator,
            'total_data' => $total_data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subjects = Subject::all();
        $currentsubject = Subject::find($id);
        return view('frontend/indicator-list', ['subjects' => $subjects, 'currentsubject' => $currentsubject]);
    }

    public function showIndicator($id)
    {
        $indicator  = Indicator::find($id);
        $indicator->update(['view' => ($indicator->view + 1)]);

        $periods = $indicator->period->items->sortBy('id', SORT_NATURAL)->values();
        $characteristics = $indicator->characteristic != null ? $indicator->characteristic->items->sortBy('id', SORT_NATURAL)->values() : null;
        $rows = $indicator->row->items->sortBy('id', SORT_NATURAL)->values();
        $characteristicitemcount = $indicator->characteristic != null ? count($indicator->characteristic->items) : 1;

        $yearsArray = [];
        $years = Year::all()->sortBy('id', SORT_NATURAL)->values();
        foreach ($years as $year) {
            $data = Data::where('code', 'like', $indicator->code . '%' . $year->code)->get();
            if (count($data) > 0) {
                $yearsArray[] = $year;
            }
        }

        $hasData = false;

        $dataarray = [];
        for ($x = 0; $x < count($rows); $x++) {
            $rowarray = [];
            $rowarray[] = $rows[$x]->name;
            foreach ($yearsArray as $year) {
                for ($y = 0; $y < count($periods); $y++) {
                    for ($z = 0; $z < $characteristicitemcount; $z++) {
                        $charcode = '000';
                        if ($characteristics != null) {
                            $charcode = $characteristics[$z]->code;
                        }

                        $code = $indicator->code . $rows[$x]->code . $charcode . $periods[$y]->code . $year->code;
                        $data = Data::where('code', 'like', $code)->get()->first()->value;
                        $rowarray[] = $data;
                    }
                }
            }
            $dataarray[] = $rowarray;
        }

        foreach ($dataarray as $row) {
            if (count($row) > 1) {
                $hasData = true;
            }
        }

        $headerrow = $indicator->row->name;
        $yearcolspan = $characteristicitemcount * count($periods);
        $periodcolspan = $characteristicitemcount;

        $yearsentence = '';
        if (count($yearsArray) > 1) {
            $yearsentence = $yearsArray[0]->name . ' - ' . $yearsArray[count($yearsArray) - 1]->name;
        } else if (count($yearsArray) == 1) {
            $yearsentence = $yearsArray[0]->name;
        }

        return view('frontend/indicator-detail', [
            'indicator' => $indicator,
            'data' => $dataarray,
            'headerrow' => $headerrow,
            'yearcolspan' => $yearcolspan,
            'years' => $yearsArray,
            'periodcolspan' => $periodcolspan,
            'periods' => $periods,
            'characteristics' => $characteristics,
            'hasData' => $hasData,
            'yearsentence' => $yearsentence,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
