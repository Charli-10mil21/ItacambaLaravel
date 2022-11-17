<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panele;
use App\Models\Maquinaria;

class PaneleController extends Controller
{
    public function index(){

         $items = Panele::paginate(5);
        return view('pro.panel_central', compact('items'));

    }

    public function store(Request $request){

        $item = Panele::create($request->all());

          return back()->with('mensaje', 'Panel Resgistrada');
    }

    public function edit($id){

        $item = Panele::find($id);
        $viajes = $item->viajes;
        $actividades = $item->actividades;
        $maquinarias = Maquinaria::paginate(5);

        return view('pro.detallePanel', compact('item','viajes','actividades','maquinarias'));

    }

    public function update(Request $request, $id){

         $item = Panele::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Panel Editado');
    }

    public function destroy(Request $request, $id){

         $item = Panele::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Panel Eliminado');
    }
}
