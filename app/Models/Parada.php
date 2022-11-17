<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    use HasFactory;

    protected $guarded =[];
     //relacion uno a muchos 
    public function actividades(){
        return $this->hasMany('App\Models\Actividade');
    }
}
