<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('unit/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unit/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $unit = Unit::create([
            'name' => $request->name,
        ]);

        $unit->update([
            'code' => sprintf("%03d", $unit->id),
        ]);

        return redirect('/units')->with('success-create', 'Satuan telah ditambah!');
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
        $unit = Unit::find($id);

        return view('unit/edit', [
            'unit' => $unit,
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

        $unit = Unit::find($id);
        $data = ([
            'name' => $request->name,
        ]);
        $unit->update($data);

        return redirect('/units')->with('success-create', 'Satuan telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return redirect('/units')->with('success-delete', 'Satuan telah dihapus!');
    }

    public function getData(Request $request)
    {
        $recordsTotal = Unit::count();
        $recordsFiltered = Unit::where('name', 'like', '%' . $request->search["value"] . '%')
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
        $units = Unit::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $unitsArray = array();
        $i = 1;
        foreach ($units as $unit) {
            $unitData = array();
            $unitData["index"] = $i;
            $unitData["name"] = $unit->name;
            $unitData["id"] = $unit->id;
            $unitsArray[] = $unitData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $unitsArray
        ]);
    }
}
