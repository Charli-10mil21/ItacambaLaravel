<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;

    protected $guarded =[];
    //relacion uno a muchos (inversa)
    public function materia(){
        return $this->belongsTo('App\Models\Materia');
    }
    public function perforacion(){
        return $this->belongsTo('App\Models\Perforacione');
    }
    public function poligono(){
        return $this->belongsTo('App\Models\Poligono');
    }

    //relacion uno a uno 
    public function laboratorio(){
        return $this->hasOne('App\Models\Laboratorio');
    }
}
