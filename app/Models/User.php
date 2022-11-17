<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//necesitamos importar esta libreria para q funcione los mutadores y accesorios
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //con fillable se define que datos se guardaran al usar asignacion masiva que esta en el admin controller
    // protected $fillable = [
    //     'nombre',
    //     'email',
    //     'password',
    // ];
    //con guarded se define los atributos que no se podran ingrsar a la base de datos, es decir que si se le pone un atributo lo ignorara y asi no podran ingresar datos que no esten permitidos y si esta vacio permite todos los datos sean guardados
    protected $guarded =[];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //esto sirve para encriptar las contraseñas
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password); 
    }


    //esto sirve para poner mutadores y accesores al atributo nombre
    protected function nombre(): Attribute
    {
        return new Attribute(
            
            get: fn($value) => ucwords($value), 

            set: function($value){
                return strtolower($value);
            }
        );
    }

    //relacion uno a muchos
    public function planificaciones(){
        return $this->hasMany('App\Models\Planificacion');
    }

    //relacion muchos a muchos
    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

}
