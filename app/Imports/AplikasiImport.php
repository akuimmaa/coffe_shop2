<?php

namespace App\Imports;

use App\Models\Aplikasi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AplikasiImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $nama_produk = $row['nama_produk'];
            $nama_suppllier = $row['nama_suppllier'];
            $harga_beli = $row['harga_beli'];
            $harga_jual = $row['harga_jual'];
            $stok = $row['stok'];
            $keterangan = $row['keterangan'];

            aplikasi::create([
                'nama_produk'      => $nama_produk,
                'nama_suppllier'   => $nama_suppllier,
                'harga_beli'       => $harga_beli,
                'harga_jual'       => $harga_jual,
                'stok'             => $stok,
                'keterangan'       => $keterangan
            ]);
        }
    }
}
