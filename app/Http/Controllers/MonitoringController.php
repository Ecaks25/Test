<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MonitoringController extends Controller
{
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header row
        $sheet->setCellValue('A1', 'Lokasi');
        $sheet->setCellValue('B1', 'Item');
        $sheet->setCellValue('C1', 'Lot Number');
        $sheet->setCellValue('D1', 'QTY (kg)');
        $sheet->setCellValue('E1', 'Coly');
        $sheet->setCellValue('F1', 'Terakhir Update');

        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, 'monitoring.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
