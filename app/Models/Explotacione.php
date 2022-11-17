<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explotacione extends Model
{
    use HasFactory;

    protected $guarded =[];

    //relacion uno a muchos (inversa)
    public function topografia(){
        return $this->belongsTo('App\Models\Topografia');
    }


}
