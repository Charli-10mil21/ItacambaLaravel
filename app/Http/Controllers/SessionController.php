<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    public function index()
    {
        return view('Inicio_sesion');
    }
    public function store(Request $request)
    {
        // if(auth()->attempt(request(["email", "password"])) == false) {
        //     return back()->withErrors([
        //         'message' => 'el correo o contraseña es incorrecto, porfavor intente de nuevo',]);
        // }


        // if(auth()->user()->campo == 'Administracion'){
        //     return redirect()->to('Administracion');
        // }else{
        //     if(auth()->user()->campo == 'Planificacion'){
        //         return redirect()->to('planificacions');
        //     }else{
        //         if(auth()->user()->campo == 'Produccion'){
        //             return redirect()->to('producciones');
        //         }
        //     }
        // }
        
            /**version de chatgpt */

            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = auth()->user();
                if ($user->campo == 'Administracion') {
                    return redirect()->to('Administracion');
                } elseif ($user->campo == 'Planificacion') {
                    return redirect()->to('planificacions');
                } elseif ($user->campo == 'Produccion') {
                    return redirect()->to('producciones');
                }
            }
    
            return back()->withErrors([
                'message' => 'El correo o contraseña es incorrecto, por favor intente de nuevo',
            ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('mensaje', 'Sesion Cerrada');
    }


}
