<?php
namespace App\Imports;

use App\Models\jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
        return new Jenis([
            'nama_jenis' => $rows ['nama_jenis'],
        ]); 
    }
                
    public function headingRow()
    {
        return 3;
    }

}