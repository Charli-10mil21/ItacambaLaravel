<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topografia extends Model
{
    use HasFactory;

    protected $guarded =[];
    
    //relacion uno a muchos 
    public function explotaciones(){
        return $this->hasMany('App\Models\Explotacione');
    }

    public function poligonos(){
        return $this->hasMany('App\Models\Poligono');
    }

    public function descripcionBlendings(){
        return $this->hasMany('App\Models\DescBlending');
    }


    
}
