<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panele extends Model
{
    use HasFactory;
    protected $guarded =[];
    //relacion uno a muchos (inversa)
    public function topografia(){
        return $this->belongsTo('App\Models\Topografia');
    }

    public function blending(){
        return $this->belongsTo('App\Models\Blending');
    }

    public function produccion(){
        return $this->belongsTo('App\Models\Produccione');
    }


    //relacion uno a muchos 
    public function viajes(){
        return $this->hasMany('App\Models\Viaje');
    }

     public function actividades(){
        return $this->hasMany('App\Models\Actividade');
    }
}
