<?php

namespace App\Http\Controllers;

use App\Helpers\Utilities;
use App\Models\Characteristic;
use App\Models\CharacteristicValue;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('characteristic/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characteristic/create');
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

        $characteristic = Characteristic::create([
            'name' => $request->name,
        ]);

        $characteristic->update([
            'code' => sprintf("%03d", $characteristic->id),
        ]);

        for ($i = 0; $i < count($request->item); $i++) {
            $characteristicvalue = CharacteristicValue::create([
                'name' => $request->item[$i],
                'characteristic_id' => $characteristic->id,
            ]);

            $characteristicvalue->update([
                'code' => sprintf("%03d", $characteristicvalue->id),
            ]);
        }

        return redirect('/characteristics')->with('success-create', 'Judul Kolom telah ditambah!');
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
        $characteristic = Characteristic::find($id);

        return view('characteristic/edit', [
            'characteristic' => $characteristic,
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

        $characteristic = Characteristic::find($id);
        $data = ([
            'name' => $request->name,
        ]);
        $characteristic->update($data);

        if ($request->removedrow) {
            CharacteristicValue::whereIn('id', $request->removedrow)->delete();
        }

        for ($i = 0; $i < count($request->item); $i++) {
            $item = new CharacteristicValue();
            if ($request->rowid[$i]) {
                $item = CharacteristicValue::find($request->rowid[$i]);
            }
            $item->name = $request->item[$i];
            $item->characteristic_id = $characteristic->id;
            $item->save();

            if ($item->code == null){
                $item->update([
                    'code' => sprintf("%03d", $item->id),
                ]);
            }

        }

        return redirect('/characteristics')->with('success-create', 'Judul Kolom telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $characteristic = Characteristic::find($id);
        $characteristic->delete();
        return redirect('/characteristics')->with('success-delete', 'Judul Kolom telah dihapus!');
    }

    public function getData(Request $request)
    {
        $recordsTotal = Characteristic::count();
        $recordsFiltered = Characteristic::where('name', 'like', '%' . $request->search["value"] . '%')
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
        $characteristics = Characteristic::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $characteristicsArray = array();
        $i = 1;
        foreach ($characteristics as $characteristic) {
            $characteristicData = array();
            $characteristicData["index"] = $i;
            $characteristicData["name"] = $characteristic->name;
            $characteristicData["items_count"] = count($characteristic->items);
            $characteristicData["items"] = Utilities::getSentenceFromArray($characteristic->items->pluck('name')->toArray(), '; ', '; ');
            $characteristicData["id"] = $characteristic->id;
            $characteristicsArray[] = $characteristicData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $characteristicsArray
        ]);
    }

}
