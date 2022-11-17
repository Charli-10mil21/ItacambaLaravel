<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

     protected $guarded =[];
    //relacion uno a muchos (inversa)
    public function panel(){
        return $this->belongsTo('App\Models\Panele');
    }

    public function volqueta(){
        return $this->belongsTo('App\Models\Volqueta');
    }


}
