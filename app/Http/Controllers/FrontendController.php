<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Indicator;
use App\Models\Message;
use App\Models\PeriodValue;
use App\Models\Subject;
use App\Models\Visitor;
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
        $visitor = Visitor::find(1);
        $visitor->update(['number' => ($visitor->number + 1)]);

        return view('frontend/home', [
            'subjects' => $subjects,
            'total_indicator' => $total_indicator,
            'total_data' => $total_data,
            'visitor' => $visitor,
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
    public function show(Request $request)
    {
        if ($request->subject == null && $request->search == null) {
            abort(404);
        }

        $subjects = Subject::all();
        $currentsubject = null;
        $hasSubject = false;
        $indicatorFound = 0;
        $indicators = null;
        $keyword = $request->search;
        if ($request->subject != null) {
            $currentsubject = Subject::find($request->subject);
            $hasSubject = true;
            $indicators = $currentsubject->indicators;
        }
        if ($request->search != null) {
            $indicators = Indicator::where('name', 'like', '%' . strtolower($request->search) . '%')->get();
        }

        $indicatorFound = count($indicators);

        return view('frontend/indicator-list', ['keyword' => $keyword, 'indicators' => $indicators, 'indicatorFound' => $indicatorFound, 'subjects' => $subjects, 'currentsubject' => $currentsubject, 'hasSubject' => $hasSubject,]);
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
            $yearsentence = $yearsArray[0]->name . ' - ' . end($yearsArray)->name;
        } else if (count($yearsArray) == 1) {
            $yearsentence = $yearsArray[0]->name;
        }

        $recommendationIndicators = Indicator::where('id', '!=', $id)->where('subject_id', '=', $indicator->subject->id)->get();

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
            'currentyear' => end($yearsArray),
            'currentperiod' => $periods[0],
            'recommendation' => $recommendationIndicators,
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

    public function getChart($id, $year = 'all', $period = null)
    {
        $indicator = Indicator::find($id);
        $periods = $indicator->period->items->sortBy('id', SORT_NATURAL)->values();
        $characteristics = $indicator->characteristic != null ? $indicator->characteristic->items->sortBy('id', SORT_NATURAL)->values() : null;
        $rows = $indicator->row->items->sortBy('id', SORT_NATURAL)->values();
        $characteristicitemcount = $indicator->characteristic != null ? count($indicator->characteristic->items) : 1;

        $yearsArray = [];
        $years = Year::all()->sortBy('id', SORT_NATURAL)->values();
        foreach ($years as $y) {
            $data = Data::where('code', 'like', $indicator->code . '%' . $y->code)->get();
            if (count($data) > 0) {
                $yearsArray[] = $y;
            }
        }

        if ($year == 'all') {
            $year = end($yearsArray)->id;
        }
        if ($period == null) {
            $period = $periods[0]->id;
        }

        for ($z = 0; $z < $characteristicitemcount; $z++) {
            $charcode = '000';
            $charname = 'Series-1';
            if ($characteristics != null) {
                $charcode = $characteristics[$z]->code;
                $charname = $characteristics[$z]->name;
            }
            $rowarray = [];

            for ($x = 0; $x < count($rows); $x++) {
                $code = $indicator->code . $rows[$x]->code . $charcode . PeriodValue::find($period)->code . Year::find($year)->code;
                $data = Data::where('code', 'like', $code)->get()->first()->value;
                $rowarray[] = (float) $data;
            }

            $dataarray[] = ['name' => $charname, 'data' => $rowarray];
        }

        return ['xAxis' => $rows->pluck('name'), 'data' => $dataarray];
    }

    public function download($id)
    {
        dd(url('/'));
    }

    public function contact()
    {
        return view('frontend/contact-us');
    }

    public function saveMessage(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Message::create([
            'sender' => $request->sender,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect('/')->with('success-create', 'Pesan telah dikirim. Petugas kami akan segera membalas pesan Anda, pastikan alamat email dan no HP dalam keadaan aktif...');
    }

    public function toWebDesa()
    {
        return 'Redirect ke Website Desa Pajurangan...';
    }
}
