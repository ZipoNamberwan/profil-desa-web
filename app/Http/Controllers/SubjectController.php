<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subject/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subject = Subject::create([
            'name' => $request->name,
            'icon' => '/assets/img/project/img/kependudukan.png',
        ]);

        $subject->update([
            'code' => sprintf("%03d", $subject->id),
        ]);

        return redirect('/subjects')->with('success-create', 'Subjek telah ditambah!');
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
        $subject = Subject::find($id);

        return view('subject/edit', [
            'subject' => $subject,
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

        $subject = Subject::find($id);
        $data = ([
            'name' => $request->name,
        ]);
        $subject->update($data);

        return redirect('/subjects')->with('success-create', 'Subjek telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('/subjects')->with('success-delete', 'Subjek telah dihapus!');
    }

    public function getData(Request $request)
    {
        $recordsTotal = Subject::count();
        $recordsFiltered = Subject::where('name', 'like', '%' . $request->search["value"] . '%')
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
        $subjects = Subject::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->skip($request->start)
            ->take($request->length)
            ->get();
        $subjectsArray = array();
        $i = 1;
        foreach ($subjects as $subject) {
            $subjectData = array();
            $subjectData["index"] = $i;
            $subjectData["name"] = $subject->name;
            $subjectData["num_indicator"] = count($subject->indicators);
            $subjectData["id"] = $subject->id;
            $subjectsArray[] = $subjectData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $subjectsArray
        ]);
    }
}
