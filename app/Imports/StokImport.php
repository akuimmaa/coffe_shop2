<?php
namespace App\Imports;

use App\Models\Stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {
            $menu_id = $row['menu_id'];
            $jumlah = $row['jumlah'];

        Stok::create([
                'menu_id' => $menu_id,
                'jumlah' => $jumlah,
            ]);

        }
    }
}
