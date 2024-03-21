<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table ='jenis';
    protected $guarded =['id'];

    public function menus(){
        return $this->hasMany(Menu::class,  "jenis_id" ,'id');
    }
}

