<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $fillable = ['transaksi_id', 'menu_id', 'jumlah', 'subtotal'];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id'); 
    }
}

class Menu extends Model 
{
    use HasFactory;
    protected $table = 'menu';
    protected $guarded = ['name']; 

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id'); 
    }
}
