<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    // protected $table ='meja';
    protected $guarded =['id'];

    public function mejas(){
        return $this->hasMany(Meja::class,  "meja_id" ,'id');
    }
}
