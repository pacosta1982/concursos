<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithDrawings;

class AdmitidosExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithDrawings, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(string $type, string $call)
    {
        $this->type = $type;
        $this->call = $call;
        $this->row = '0';
    }

    public function query()
    {
        return Application::query()
        ->where('call_id', $this->call);
        /*->whereHas('statuses', function($q){
            $q->orderBy('status_id');
        });*/
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('');
        $drawing->setDescription('');
        $drawing->setPath(public_path('/images/logo.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        /*$drawing2 = new Drawing();
        $drawing2->setName('');
        $drawing2->setDescription('');
        $drawing2->setPath(public_path('/images/gobierno.png'));
        $drawing2->setHeight(90);
        $drawing2->setCoordinates('E1');*/

        /*$drawing3 = new Drawing();
        $drawing3->setName('');
        $drawing3->setDescription('');
        $drawing3->setPath(public_path('/images/paraguay-de-la-gente.png'));
        $drawing3->setHeight(90);
        $drawing3->setCoordinates('L1');*/

    return [$drawing/*, $drawing2,*/ /*$drawing3*/];

    }

    public function headings(): array
    {
        return [
            'NRO',
            'CODIGO',
            'NOMBRE',
            'NACIMIENTO',
            'DOCUMENTO',
            'EMAIL',
            'DESCRIPCION',
            'ESTADO',
        ];
    }

    public function map($invoice): array
    {
        return [
            ++$this->row,
            $invoice->call->Position->acronym,
            $invoice->resume->names.' '.$invoice->resume->last_names,
            $invoice->resume->birthdate,
            $invoice->resume->government_id,
            $invoice->resume->email,
            $invoice->statuses->description,
            $invoice->statuses->status->name == "Admitido" ? "Cumple" : 'No cumple',
            //Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A6:H6')->getFont()->setBold(true)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('A6:H6')->getFill()
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
