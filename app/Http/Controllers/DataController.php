<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Indicator;
use App\Models\Year;
use Exception;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indicators = Indicator::all();
        $years = Year::all();
        return view('input_data/create', ['indicators' => $indicators, 'years' => $years]);
    }

    public function download(Request $request)
    {
        $request->validate([
            'indicator' => 'required',
            'year.*' => 'required'
        ]);

        $indicator = Indicator::find($request->indicator);

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $startrow = 6;
        $movingrow = $startrow;

        $firstcol = 'B';

        $movingcol = $firstcol;
        $years = Year::find($request->year)->sortByDesc('id', SORT_NATURAL);
        $periods = $indicator->period->items->sortBy('id', SORT_NATURAL)->values();
        $rows = $indicator->row->items->sortBy('id', SORT_NATURAL)->values();
        $characteristics = $indicator->characteristic != null ? $indicator->characteristic->items->sortBy('id', SORT_NATURAL)->values() : null;

        $characteristicitemcount = $indicator->characteristic != null ? count($indicator->characteristic->items) : 1;
        $yearcol = count($indicator->period->items) * $characteristicitemcount;

        foreach ($years as $y) {
            $activeWorksheet->setCellValue($movingcol . ($movingrow - 3), $y->name);
            $initcol = $movingcol;

            for ($x = 0; $x < $yearcol; $x++) {
                $activeWorksheet->setCellValue($movingcol . ($movingrow - 1), $characteristics != null ? $characteristics[$x % $characteristicitemcount]->name : '');
                $activeWorksheet
                    ->getStyle($movingcol . ($movingrow - 1))
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('90EE90');
                if ($x != ($yearcol - 1)) {
                    $movingcol++;
                }
            }

            $activeWorksheet->mergeCells($initcol . ($movingrow - 3) . ':' . $movingcol . ($movingrow - 3));
            $activeWorksheet->getStyle($initcol . ($movingrow - 3) . ':' . $movingcol . ($movingrow - 3))->getAlignment()->setHorizontal('center');
            $activeWorksheet
                ->getStyle($initcol . ($movingrow - 3) . ':' . $movingcol . ($movingrow - 3))
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('ADD8E6');
            $movingcol++;
        }

        $movingcol = $firstcol;
        foreach ($years as $y) {
            $initcol = $movingcol;
            foreach ($periods as $p) {
                $activeWorksheet->setCellValue($movingcol . ($movingrow - 2), $p->name);
                for ($x = 0; $x < $characteristicitemcount; $x++) {
                    if ($x != ($characteristicitemcount - 1)) {
                        $movingcol++;
                    }
                }
                $activeWorksheet->mergeCells($initcol . ($movingrow - 2) . ':' . $movingcol . ($movingrow - 2));
                $activeWorksheet->getStyle($initcol . ($movingrow - 2) . ':' . $movingcol . ($movingrow - 2))->getAlignment()->setHorizontal('center');
                $activeWorksheet
                    ->getStyle($initcol . ($movingrow - 2) . ':' . $movingcol . ($movingrow - 2))
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFC0CB');
                $movingcol++;
                $initcol = $movingcol;
            }
        }

        foreach ($rows as $row) {
            $activeWorksheet->setCellValue('A' . $movingrow, $row->name);
            $activeWorksheet
                ->getStyle('A' . $movingrow)
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFD580');
            $movingrow++;
        }

        $activeWorksheet->setCellValue('A1', $indicator->name);
        $activeWorksheet->mergeCells('A1:L1');
        $activeWorksheet
            ->getStyle('A1:L1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFD580');

        foreach (range('A', $movingcol) as $v) {
            $activeWorksheet->getColumnDimension($v)->setAutoSize(true);
        }

        $dataarray = [];
        for ($x = 0; $x < count($rows); $x++) {
            $rowarray = [];
            foreach ($years as $year) {
                for ($y = 0; $y < count($periods); $y++) {
                    for ($z = 0; $z < $characteristicitemcount; $z++) {
                        $charcode = '000';
                        if ($characteristics != null) {
                            $charcode = $characteristics[$z]->code;
                        }

                        $code = $indicator->code . $rows[$x]->code . $charcode . $periods[$y]->code . $year->code;
                        $data = Data::where('code', 'like', $code)->get();
                        if (count($data) > 0) {
                            $data = $data->first()->value;
                        } else {
                            $data = null;
                        }
                        $rowarray[] = $data;
                    }
                }
            }
            $dataarray[] = $rowarray;
        }

        $movingrow = $startrow;
        $movingcol = $firstcol;
        foreach ($dataarray as $row) {
            $movingcol = $firstcol;
            foreach ($row as $cell) {
                if ($cell !== null)
                    $activeWorksheet->setCellValue($movingcol . $movingrow, $cell);
                $movingcol++;
            }
            $movingrow++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="template.xlsx"');
        $writer->save('php://output');
    }

    public function save(Request $request)
    {
        $request->validate([
            'indicator' => 'required',
            'year.*' => 'required',
            'inputfile' => 'required',
        ]);

        $indicator = Indicator::find($request->indicator);
        $years = Year::find($request->year)->sortByDesc('id', SORT_NATURAL)->values();
        $periods = $indicator->period->items->sortBy('id', SORT_NATURAL)->values();
        $characteristics = $indicator->characteristic != null ? $indicator->characteristic->items->sortBy('id', SORT_NATURAL)->values() : null;
        $rows = $indicator->row->items->sortBy('id', SORT_NATURAL)->values();
        $characteristicitemcount = $indicator->characteristic != null ? count($indicator->characteristic->items) : 1;

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('inputfile'));

        $activeWorksheet = $spreadsheet->getActiveSheet();

        $startcol = 'B';
        $totalcol = count($years) * $characteristicitemcount * count($periods);

        $startrow = 6;

        for ($x = 0; $x < count($rows); $x++) {
            $movingcol = $startcol;
            for ($y = 0; $y < $totalcol; $y++) {
                $value = $activeWorksheet->getCell($movingcol . ($x + $startrow))->getCalculatedValue();

                if ($value !== null && $value !== '') {
                    $charcode = '000';
                    if ($characteristics != null) {
                        $charcode = $characteristics[fmod($y, count($characteristics))]->code;
                    }

                    $periodindex = floor(fmod($y, count($periods) * $characteristicitemcount) / 3);

                    $yearvalue = $years[floor($y / (count($periods) * $characteristicitemcount))];

                    $code = $indicator->code . $rows[$x]->code . $charcode . $periods[$periodindex]->code . $yearvalue->code;

                    $data = Data::where(['code' => $code])->get()->first();

                    if ($data != null) {
                        $data->update(['value' => $value]);
                    } else {
                        Data::create([
                            'code' => $code,
                            'value' => $value,
                        ]);
                    }
                }

                $movingcol++;
            }
        }

        return redirect('/indicators')->with('success-create', 'Data telah diupload!');
    }

    public function delete()
    {
        $indicators = Indicator::all();
        $years = Year::all();
        return view('input_data/cleardata', ['years' => $years, 'indicators' => $indicators]);
    }

    public function clear(Request $request)
    {
        $request->validate([
            'indicator' => 'required',
            'year.*' => 'required',
        ]);

        $indicator = Indicator::find($request->indicator);
        $years = Year::find($request->year)->sortByDesc('id', SORT_NATURAL)->values();
        foreach ($years as $year) {
            Data::where('code', 'like', $indicator->code . '%' . $year->code)->delete();
        }

        return redirect('/indicators')->with('success-delete', 'Data telah dihapus!');
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
        //
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
