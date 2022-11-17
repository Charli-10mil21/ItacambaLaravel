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
}
