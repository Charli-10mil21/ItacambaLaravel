<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class SessionController extends Controller
{
    public function create()
    {
        return view('Inicio_sesion');
    }
    public function store()
    {
        if(auth()->attempt(request(["email", "password"])) == false) {
            return back()->withErrors([
                'message' => 'el correo o contraseña es incorrecto, porfavor intente de nuevo',]);
        }


        if(auth()->user()->campo == 'Administracion'){
            return redirect()->to('Administracion');
        }else{
            if(auth()->user()->campo == 'Planificacion'){
                return redirect()->to('planificacions');
            }else{
                if(auth()->user()->campo == 'Produccion'){
                    return redirect()->to('producciones');
                }
            }
        }
        
    }
}
