<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Indicator;
use App\Models\Period;
use App\Models\Row;
use App\Models\Subject;
use App\Models\Unit;
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

        return redirect('/indicators')->with('success-create', 'Indikator telah ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        ]);

        $indicator = Indicator::find($id);
        $data = ([
            'name' => $request->name,
        ]);
        $indicator->update($data);

        return redirect('/indicators')->with('success-create', 'Indikator telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indicator = Indicator::find($id);
        $indicator->delete();
        return redirect('/indicators')->with('success-delete', 'Indikator telah dihapus!');
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
