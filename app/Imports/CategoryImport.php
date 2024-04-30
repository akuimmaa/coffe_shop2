<?php
namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
             return new Category([
                    'nama'   => $rows['nama'],
              ]); 
     }

     public function headingRow()
     {
        return 3;
     }
}
