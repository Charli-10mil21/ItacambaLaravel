<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panele extends Model
{
    use HasFactory;
    protected $guarded =[];
    //relacion uno a muchos (inversa)


    public function produccion(){
        return $this->belongsTo('App\Models\Produccione');
    }

    public function turno(){
        return $this->belongsTo('App\Models\Turno');
    }


    //relacion uno a muchos 
    public function viajes(){
        return $this->hasMany('App\Models\Viaje');
    }

     public function actividades(){
        return $this->hasMany('App\Models\Actividade');
    }

    public function usoMaquinarias(){
        return $this->hasMany('App\Models\DescMaquinaria');
    }
}
