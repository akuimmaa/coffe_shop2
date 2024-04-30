<?php
namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
             return new Menu([
                    'id'         => $rows['id'],
                    'nama_menu'  => $rows['nama_menu'],
                    'harga'      => $rows['harga'],
                    'image'      => $rows['image'],
                    'deskripsi'  => $rows['deskripsi'],
              ]); 
     }

     public function headingRow()
     {
        return 3;
     }
}
