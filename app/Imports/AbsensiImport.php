<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    public function model(Array $rows)
    {
                return new Absensi([
                    'nama_karyawan'    => $rows ['nama_karyawan'],
                    'tanggal_masuk'    => $rows ['tanggal_masuk'],
                    'waktu_masuk'      => $rows ['waktu_masuk'],
                    'status'           => $rows ['status'],
                    'waktu_selesai'    => $rows ['waktu_selesai'],
              ]); 
    }
    public function headingRow(){
        return 3;
    }
}
