<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produccione;

class ProduccioneController extends Controller
{
    public function index(){

         $items = Produccione::paginate(5);
        return view('pro.home', compact('items'));

    }

    public function store(Request $request){

        $item = Produccione::create($request->all());

          return back()->with('mensaje', 'Produccion Resgistrada');
    }

    public function edit($id){

        $item = Produccione::find($id);
        $paneles= $item->paneles;
        return view('pro.detalleProduccion', compact('item', 'paneles'));
    }

    public function update(Request $request, $id){

         $item = Produccione::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Informe Editado');
    }

    public function destroy(Request $request, $id){

         $item = Produccione::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Informe Eliminado');
    }

}
