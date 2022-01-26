<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AdmitidosExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(string $type, string $call)
    {
        $this->type = $type;
        $this->call = $call;
    }

    public function query()
    {
        return Application::query()
        ->where('call_id', $this->call)
        ->whereHas('statuses', function($q){
            $q->where('status_id', $this->type);
        });
    }

    public function headings(): array
    {
        return [
            'CODIGO',
            'NOMBRE',
            'NACIMIENTO',
            'DOCUMENTO',
            'EMAIL',
            'ESTADO',
        ];
    }

    public function map($invoice): array
    {
        return [
            $invoice->code,
            $invoice->resume->names.' '.$invoice->resume->last_names,
            $invoice->resume->birthdate,
            $invoice->resume->government_id,
            $invoice->resume->email,
            $invoice->statuses->status->name,
            //Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('A1:F1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
       // $sheet->getStyle('1')->getFont()->getbac
        //->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
        /*return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            //'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            //'C'  => ['font' => ['size' => 16]],
        ];*/
    }
}
