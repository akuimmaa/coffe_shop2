<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table ='stok';
    protected $guarded =['id'];

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
