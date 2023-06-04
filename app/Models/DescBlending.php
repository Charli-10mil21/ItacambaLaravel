<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescBlending extends Model
{
    use HasFactory;

    protected $guarded =[];

    //relacion uno a muchos (inversa)
    public function blending(){
        return $this->belongsTo('App\Models\Blending');
    }

    public function topografia(){
        return $this->belongsTo('App\Models\Topografia');
    }

    public function poligono(){
        return $this->belongsTo('App\Models\Poligono');
    }

    public function laboratorio(){
        return $this->belongsTo('App\Models\Laboratorio');
    }


}
