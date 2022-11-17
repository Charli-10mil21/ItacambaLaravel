<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blending extends Model
{
    use HasFactory;

    protected $guarded =[];
    //relacion uno a muchos 
    public function laboratorios(){
        return $this->hasMany('App\Models\Laboratorio');
    }


    public function paneles(){
        return $this->hasMany('App\Models\Panele');
    }
    //relacion uno a muchos (inversa)
    public function planificacion(){
        return $this->belongsTo('App\Models\Planificacion');
    }

    public function topografia(){
        return $this->belongsTo('App\Models\Topografia');
    }
    public function poligono(){
        return $this->belongsTo('App\Models\Topografia');
    }


}
