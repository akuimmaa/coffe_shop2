<?php
namespace App\Imports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class StokImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
       return new Stok([
                    'menu_id' => $rows['menu_id'],
                    'jumlah'  => $rows['jumlah'],
              ]); 
       
    }

    public function headingRow(){
        return 3;
    }
}
