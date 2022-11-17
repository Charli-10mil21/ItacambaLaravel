<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    use HasFactory;
    protected $guarded =[];

    //relacion uno a muchos (inversa)
    public function parada(){
        return $this->belongsTo('App\Models\Parada');
    }

    public function panel(){
        return $this->belongsTo('App\Models\Panele');
    }
}
