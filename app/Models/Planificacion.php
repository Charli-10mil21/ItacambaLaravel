<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

     //relacion muchos a muchos
    public function volquetas(){
        return $this->belongsToMany('App\Models\Volqueta');
    }
    //relacion uno a muchos
    public function blendings(){
        return $this->hasMany('App\Models\Blending');
    }

    public function scopeFiltro($query, $filters){
        $query->when($filters['name'] ?? null, function($query, $name){
            $query->where('name', $name);
        })->when($filters['user'] ?? null, function($query, $user){
            $query->where('user_id', $user);
        })->when($filters['fromdate'] ?? null, function($query, $fromdate){
            $query->where('fechaIni', '>=', $fromdate);
        })->when($filters['todate'] ?? null, function($query, $todate){
            $query->where('fechaIni', '<=', $todate);
        });

    }
}
