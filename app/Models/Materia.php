<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

     protected $guarded =[];

     //relacion uno a muchos

    public function muestras(){
        return $this->hasMany('App\Models\Muestra');
    }
}
