<?php

namespace App\Http\Controllers;

use App\Repository\ExcelRepository;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportController extends Controller{
    public static function download(){
        return view('download');
    }
    public static function exportReport(){
        $mySpreadsheet = new Spreadsheet();

        // delete the default active sheet
        $mySpreadsheet->removeSheetByIndex(0);

        $data = ExcelRepository::exportExcel();

        // array_splice($data, 0, 0, ['IDsurvey','name','date','phone','email','branch', 'question','answerdata','comment']);

        // Create "Sheet 1" tab as the first worksheet.
        // https://phpspreadsheet.readthedocs.io/en/latest/topics/worksheets/adding-a-new-worksheet
        $worksheet1 = new Worksheet($mySpreadsheet, "Sheet 1");
        $mySpreadsheet->addSheet($worksheet1, 0);

        // $sheet2Data = [
        //     ["Model", "Production Year Start", "Production Year End"],
        //     ["308 GTB",  1975, 1985],
        //     ["360 Spider",  1999, 2004],
        //     ["488 GTB",  2015, 2020],
        // ];

        // // Create "Sheet 2" tab as the second worksheet.
        // $worksheet2 = new Worksheet($mySpreadsheet, "Sheet 2");
        // $mySpreadsheet->addSheet($worksheet2, 1);




        $worksheet1->fromArray($data);
        // $worksheet2->fromArray($sheet2Data);

        // Change the widths of the columns to be appropriately large for the content in them.
        // https://stackoverflow.com/questions/62203260/php-spreadsheet-cant-find-the-function-to-auto-size-column-width
        // $worksheets = [$worksheet1,$worksheet2];
        $worksheets = [$worksheet1];

        foreach ($worksheets as $worksheet)
        {
            foreach ($worksheet->getColumnIterator() as $column)
            {
                $worksheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
            }
        }

        // dd($data);

        // // Save to file.
        $writer = new Xlsx($mySpreadsheet);
        // $writer->save('output.xlsx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="output.xlsx"');
        $writer->save('php://output');
    }
}
