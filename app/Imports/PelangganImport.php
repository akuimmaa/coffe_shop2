<?php
namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
             return new Pelanggan([
                'nama_pelanggan' => $rows['nama_pelanggan'],
                'no_telp'        => $rows['no_telp'],
                'email'          => $rows['email'],
                'alamat'         => $rows['alamat'],
              ]); 
     }

     public function headingRow()
     {
        return 3;
     }
}

