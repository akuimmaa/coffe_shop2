<?php

namespace App\Exports;

use App\Models\Jenis;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;

class JenisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jenis::all();
        return Jenis::where('nama_jenis', auth()->user()->nama_jenis)->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama_Jenis',
            'Tools'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class   => function(AfterSheet $event) {
                $event->sheet->getClumnDimension('A')->setAutoSize(true);
                $event->sheet->getClumnDimension('B')->setAutoSize(true);
                $event->sheet->getClumnDimension('C')->setAutoSize(true);

                $event->sheet->insertNeaRowBefore(1, 2);
                $event->sheet->mergeCells('A1:C1');
                $event->sheet->setCellValue('A1', 'DATA JENIS MENU');
                $event->sheet->getStyle('A1')->getFont()->setBold(true); 
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                
                $event->sheet->getStyle('A3;C' .$event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderstyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb'  => '000000']
                        ]
                    ]
                        ]);
            }
        ];
    }
}



   //public function view(): View
   // {
    //    return view('jenis.data', [
     //       'jenis' => Jenis::all()
      //  ]);
    //}