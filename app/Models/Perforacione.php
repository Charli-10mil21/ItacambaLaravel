<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perforacione extends Model
{
    use HasFactory;


    protected $guarded =[];
     //relacion uno a muchos (inversa)
     public function poligono(){
        return $this->belongsTo('App\Models\Poligono');
    }

    
}
