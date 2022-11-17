<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volqueta extends Model
{

    protected $guarded =[];
    
    use HasFactory;
     //relacion muchos a muchos
    public function planificaciones(){
        return $this->belongsToMany('App\Models\Planificacion');
    }

    //relacion uno a muchos 
    public function viajes(){
        return $this->hasMany('App\Models\Viaje');
    }
}
