<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blending extends Model
{
    use HasFactory;

    protected $guarded =[];

    //relacion uno a muchos 
    public function descripcionblendings(){
        return $this->hasMany('App\Models\DescBlending');
    }
    public function producciones(){
        return $this->hasMany('App\Models\Produccione');
    }


    //relacion uno a muchos 
    public function laboratorios(){
        return $this->hasMany('App\Models\Laboratorio');
    }


    //relacion uno a muchos (inversa)
    public function materia(){
        return $this->belongsTo('App\Models\Materia');
    }
    //relacion uno a muchos (inversa)
    public function planificacion(){
        return $this->belongsTo('App\Models\Planificacion');
    }


}
