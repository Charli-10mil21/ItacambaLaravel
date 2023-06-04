<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccione extends Model
{
    use HasFactory;
    protected $guarded =[];

    //relacion uno a muchos 
    public function paneles(){
        return $this->hasMany('App\Models\Panele');
    }

    //relacion uno a muchos (inversa)
    public function blending(){
        return $this->belongsTo('App\Models\Blending');
    }


    //Query Scopes 
    public function scopeFilter($query, $fecha){
        $query->when($fecha ?? null, function($query, $fecha){
            $query->where('fecha', $fecha);
        });
    }

    //query Scope 

    public function scopeFiltro($query, $filters){
        $query->when($filters['blending_id'] ?? null, function($query, $blending_id){
            $query->where('blending_id', $blending_id);
        })->when($filters['fromdate'] ?? null, function($query, $fromdate){
            $query->where('fecha', '>=', $fromdate);
        })->when($filters['todate'] ?? null, function($query, $todate){
            $query->where('fecha', '<=', $todate);
        });

    }
}
