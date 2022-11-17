<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $guarded =[];

    //relacion uno a uno inversa
    public function muestra(){
        return $this->belongsTo('App\Models\Muestra');
    }

    //relacion uno a muchos inversa
    public function blending(){
        return $this->belongsTo('App\Models\Blending');
    }

}
