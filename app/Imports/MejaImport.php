<?php
namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
             return new Meja([
                    'nomor_meja'   => $rows['nomor_meja'],
                    'kapasitas'  => $rows['kapasitas'],
                    'status'      => $rows['status'],
              ]); 
     }

     public function headingRow()
     {
        return 3;
     }
}
