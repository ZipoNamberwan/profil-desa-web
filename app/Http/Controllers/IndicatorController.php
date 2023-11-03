<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Data;
use App\Models\Indicator;
use App\Models\Period;
use App\Models\PeriodValue;
use App\Models\Row;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Year;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('indicator/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $characteristics = Characteristic::all();
        $periods = Period::all();
        $rows = Row::all();
        $subjects = Subject::all();
        $units = Unit::all();
        return view('indicator/create', ['characteristics' => $characteristics, 'rows' => $rows, 'periods' => $periods, 'subjects' => $subjects, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'row' => 'required',
            'period' => 'required',
        ]);

        $array = [
            'name' => $request->name,
            'subject_id' => $request->subject,
            'period_id' => $request->period,
            'row_id' => $request->row,
            'source' => $request->source,
        ];
        if ($request->characteristic != null) {
            $array['characteristic_id'] = $request->characteristic;
        }
        if ($request->unit != null) {
            $array['unit_id'] = $request->unit;
        }

        $indicator = Indicator::create($array);

        $indicator->update([
            'code' => sprintf("%03d", $indicator->id),
        ]);

        return redirect('/indicators')->with('success-create', 'Judul Tabel telah ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $indicator = Indicator::find($id);
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
            $yearsentence = $yearsArray[0]->name . ' - ' . end($yearsArray)->name;
        } else if (count($yearsArray) == 1) {
            $yearsentence = $yearsArray[0]->name;
        }
        return view(
            'indicator/view',
            [
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
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $characteristics = Characteristic::all();
        $periods = Period::all();
        $rows = Row::all();
        $subjects = Subject::all();
        $units = Unit::all();
        $indicator = Indicator::find($id);

        return view('indicator/edit', [
            'indicator' => $indicator,
            'characteristics' => $characteristics, 'rows' => $rows, 'periods' => $periods, 'subjects' => $subjects, 'units' => $units,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'row' => 'required',
            'period' => 'required',
        ]);

        $array = [
            'name' => $request->name,
            'subject_id' => $request->subject,
            'period_id' => $request->period,
            'row_id' => $request->row,
            'source' => $request->source,
        ];
        if ($request->characteristic != null) {
            $array['characteristic_id'] = $request->characteristic;
        }
        if ($request->unit != null) {
            $array['unit_id'] = $request->unit;
        }

        $indicator = Indicator::find($id);
        $indicator->update($array);

        return redirect('/indicators')->with('success-create', 'Judul Tabel telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indicator = Indicator::find($id);
        $indicator->delete();
        return redirect('/indicators')->with('success-delete', 'Judul Tabel telah dihapus!');
    }

    public function getData(Request $request)
    {
        $recordsTotal = Indicator::count();
        $recordsFiltered = Indicator::where('name', 'like', '%' . $request->search["value"] . '%')
            ->count();

        $orderColumn = 'name';
        $orderDir = 'DESC';
        if ($request->order != null) {
            if ($request->order[0]['dir'] == 'asc') {
                $orderDir = 'asc';
            } else {
                $orderDir = 'desc';
            }
            if ($request->order[0]['column'] == '0') {
                $orderColumn = 'name';
            }
        }
        $indicators = Indicator::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $indicatorsArray = array();
        $i = 1;
        foreach ($indicators as $indicator) {
            $indicatorData = array();
            $indicatorData["index"] = $i;
            $indicatorData["name"] = $indicator->name;
            $indicatorData["row"] = $indicator->row->name;
            $indicatorData["period"] = $indicator->period->name;
            $indicatorData["characteristic"] = $indicator->characteristic != null ? $indicator->characteristic->name : '-';
            $indicatorData["id"] = $indicator->id;
            $indicatorsArray[] = $indicatorData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $indicatorsArray
        ]);
    }
}
