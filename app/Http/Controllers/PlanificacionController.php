<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planificacion;
use App\Models\User;

class PlanificacionController extends Controller
{
    public function index(){

         $items = Planificacion::paginate(5);
         $users = User::all();
        return view('plani.home', compact('items','users'));

    }

    public function store(Request $request){

        $item = Planificacion::create($request->all());

          return back()->with('mensaje', 'Planificacion Resgistrada');
    }

    public function edit($id){

        $item = Planificacion::find($id);
        $user= $item->user;
        $blendings= $item->blendings;
        return view('plani.detallePlanificacion', compact('item','user','blendings'));
    }

    public function update(Request $request, $id){

         $item = Planificacion::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Informe Editado');
    }

    public function destroy(Request $request, $id){

         $item = Planificacion::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Informe Eliminado');
    }
}
