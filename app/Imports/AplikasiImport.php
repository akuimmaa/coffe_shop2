<?php
namespace App\Imports;

use App\Models\Aplikasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AplikasiImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
             return new Aplikasi([
                'nama_produk'    => $rows['nama_produk'],
                'nama_suppllier' => $rows['nama_suppllier'],
                'harga_beli'     => $rows['harga_beli'],
                'harga_jual'     => $rows['harga_jual'],
                'stok'           => $rows['stok'],
                'keterangan'     => $rows['keterangan'],
              ]); 
     }

     public function headingRow()
     {
        return 3;
     }
}


