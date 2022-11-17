<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poligono extends Model
{
    use HasFactory;

    protected $guarded =[];
    //relacion uno a muchos (inversa)
    public function topografia(){
        return $this->belongsTo('App\Models\Topografia');
    }

    //relacion uno a muchos
     public function perforaciones(){

        return $this->hasMany('App\Models\Perforacione');
    }
    public function blendings(){

        return $this->hasMany('App\Models\Blending');
    }
}
