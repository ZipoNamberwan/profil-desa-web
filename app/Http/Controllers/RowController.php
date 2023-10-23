<?php

namespace App\Http\Controllers;

use App\Models\Row;
use App\Models\RowValue;
use Illuminate\Http\Request;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('row/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('row/create');
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

        $row = Row::create([
            'name' => $request->name,
        ]);

        $row->update([
            'code' => sprintf("%03d", $row->id),
        ]);

        for ($i = 0; $i < count($request->item); $i++) {
            $rowvalue = RowValue::create([
                'name' => $request->item[$i],
                'row_id' => $row->id,
            ]);

            $rowvalue->update([
                'code' => sprintf("%03d", $rowvalue->id),
            ]);
        }

        return redirect('/rows')->with('success-create', 'Judul Baris telah ditambah!');
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
        $row = Row::find($id);

        return view('row/edit', [
            'row' => $row,
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

        $row = Row::find($id);
        $data = ([
            'name' => $request->name,
        ]);
        $row->update($data);

        if ($request->removedrow) {
            RowValue::whereIn('id', $request->removedrow)->delete();
        }

        for ($i = 0; $i < count($request->item); $i++) {
            $item = new RowValue();
            if ($request->rowid[$i]) {
                $item = RowValue::find($request->rowid[$i]);
            }
            $item->name = $request->item[$i];
            $item->row_id = $row->id;
            $item->save();

            if ($item->code == null){
                $item->update([
                    'code' => sprintf("%03d", $item->id),
                ]);
            }

        }

        return redirect('/rows')->with('success-create', 'Judul Baris telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Row::find($id);
        $row->delete();
        return redirect('/rows')->with('success-delete', 'Judul Baris telah dihapus!');
    }

    public function getData(Request $request)
    {
        $recordsTotal = Row::count();
        $recordsFiltered = Row::where('name', 'like', '%' . $request->search["value"] . '%')
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
        $rows = Row::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $rowsArray = array();
        $i = 1;
        foreach ($rows as $row) {
            $rowData = array();
            $rowData["index"] = $i;
            $rowData["name"] = $row->name;
            $rowData["items_count"] = count($row->items);
            $rowData["id"] = $row->id;
            $rowsArray[] = $rowData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $rowsArray
        ]);
    }
}
