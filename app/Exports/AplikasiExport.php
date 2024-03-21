<?php

namespace App\Exports;

use App\Models\Aplikasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;

class AplikasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aplikasi::all();
        return Aplikasi::where('nama_produk', auth()->user()->nama_produk)->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama_Produk',
            'Nama_Suppllier',
            'Harga_Beli',
            'Harga_Jual',
            'Stok',
            'Keterangan',
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
                $event->sheet->getClumnDimension('D')->setAutoSize(true);
                $event->sheet->getClumnDimension('E')->setAutoSize(true);

                $event->sheet->insertNeaRowBefore(1, 2);
                $event->sheet->mergeCells('A1:E1');
                $event->sheet->setCellValue('A1', 'DATA TENTANG APLIKASI');
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
