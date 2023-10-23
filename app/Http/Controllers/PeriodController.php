<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\PeriodValue;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('period/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('period/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'item.*' => 'required',
        ]);

        $period = Period::create([
            'name' => $request->name,
        ]);

        $period->update([
            'code' => sprintf("%03d", $period->id),
        ]);

        for ($i = 0; $i < count($request->item); $i++) {
            $periodvalue = PeriodValue::create([
                'name' => $request->item[$i],
                'period_id' => $period->id,
            ]);

            $periodvalue->update([
                'code' => sprintf("%03d", $periodvalue->id),
            ]);
        }

        return redirect('/periods')->with('success-create', 'Periode telah ditambah!');
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
        $period = Period::find($id);

        return view('period/edit', [
            'period' => $period,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'item.*' => 'required',
        ]);

        $period = Period::find($id);
        $data = ([
            'name' => $request->name,
        ]);
        $period->update($data);

        if ($request->removedrow) {
            PeriodValue::whereIn('id', $request->removedrow)->delete();
        }

        for ($i = 0; $i < count($request->item); $i++) {
            $item = new PeriodValue();
            if ($request->rowid[$i]) {
                $item = PeriodValue::find($request->rowid[$i]);
            }
            $item->name = $request->item[$i];
            $item->period_id = $period->id;
            $item->save();

            if ($item->code == null){
                $item->update([
                    'code' => sprintf("%03d", $item->id),
                ]);
            }

        }

        return redirect('/periods')->with('success-create', 'Periode telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $period = Period::find($id);
        $period->delete();
        return redirect('/periods')->with('success-delete', 'Periode telah dihapus!');
    }

    public function getData(Request $request)
    {
        $recordsTotal = Period::count();
        $recordsFiltered = Period::where('name', 'like', '%' . $request->search["value"] . '%')
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
        $periods = Period::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $periodsArray = array();
        $i = 1;
        foreach ($periods as $period) {
            $periodData = array();
            $periodData["index"] = $i;
            $periodData["name"] = $period->name;
            $periodData["items_count"] = count($period->items);
            $periodData["id"] = $period->id;
            $periodsArray[] = $periodData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $periodsArray
        ]);
    }

}
