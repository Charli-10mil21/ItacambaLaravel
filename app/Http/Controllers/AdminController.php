<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
     public function admin(){
        return view('admin.home');
    }

    public function usuario(){

         $usuarios = User::orderBy('id','desc')->paginate(5);
        return view('admin.usuario', compact('usuarios'));

    }
     public function guardar(Request $request){

          //esta es la antigua forma de insertar datos a la base de datos pero es muy moroso 
          
          // $usuario = new User();

          // $usuario->nombre = $request->nombre;
          // $usuario->apellido = $request->apellido;
          // $usuario->email = $request->email;
          // $usuario->password = $request->password;
          // $usuario->campo = $request->campo;
          // $usuario->telefono = $request->telefono;

          // $usuario->save();

          //con esto se inserta todos los datos importante que los campos del imput tengan un name con los mismos valores que estan en la base de datos para que no tenga un error al llenar los datos de forma automatica
          $usuario = User::create($request->all());

          return back()->with('mensaje', 'Usuario Resgistrado');
    }
    public function detalle($id){

         $usuario = User::find($id);

        return view('admin.detalleUsuario', compact('usuario'));

    }

    public function editar(Request $request, $id){

         $usuario = User::findOrFail($id);
         $usuario->update($request->all());
          return back()->with('mensaje', 'Usuario Editado');
    }

    public function eliminar(Request $request, $id){

         $usuario = User::findOrFail($id);
         $usuario->delete();
          return back()->with('mensaje', 'Usuario Eliminado');
    }

}
