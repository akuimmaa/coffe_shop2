<?php
namespace App\Imports;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {
            $jenis_id = $row['jenis_id'];
            $nama_menu = $row['nama_menu'];
            $harga = $row['harga'];
            $image = $row['image'];
            $deskripsi = $row['deskripsi'];

            Menu::create([
                'jenis_id'  => $jenis_id,
                'nama_menu' => $nama_menu,
                'harga'     => $harga,
                'image'     => $image,
                'deskripsi' => $deskripsi
            ]);
        }
    }
}
