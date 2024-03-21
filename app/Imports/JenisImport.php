<?php
namespace App\Imports;

use App\Models\jenis;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jenisImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {
            $nama_jenis = $row['nama_jenis'];

            Jenis::create([
                'nama_jenis' => $nama_jenis
            ]);
        }
    }
}
