<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    use HasFactory;
    protected $guarded =[];

    //relacion uno a muchos 
    public function usoMaquinarias(){
        return $this->hasMany('App\Models\DescMaquinaria');
    }
}
