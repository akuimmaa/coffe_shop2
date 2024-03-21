<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];

    public function detailTransaksi(){
        return $this->hasMany(detailTransaksi::class); 
    }
}

