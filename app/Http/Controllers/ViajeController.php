<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Models\Maquinaria;
use App\Models\Actividade;

class ViajeController extends Controller
{
     public function index(){

         // $items = Viaje::paginate(5);
        $maquinarias = Maquinaria::paginate(5);
        $actividades = Actividade::paginate(5);
        $viajes = Viaje::paginate(5);
        return view('pro.viaje',compact('maquinarias','actividades','viajes'));

    }

    public function store(Request $request){

        $item = Viaje::create($request->all());

          return back()->with('mensaje', 'Viaje Resgistrado');
    }

    public function edit($id){

        $item = Viaje::find($id);

        return view('pro.detalleViaje', compact('item'));

    }

    public function update(Request $request, $id){

         $item = Viaje::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Viaje Editado');
    }

    public function destroy(Request $request, $id){

         $item = Viaje::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Viaje Eliminado');
    }
}
