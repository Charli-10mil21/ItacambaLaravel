<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perforacione;
use App\Models\Poligono;


class PerforacioneController extends Controller
{
    public function index(){

         $items = Perforacione::paginate(5);
         $poligonos = Poligono::all();
        return view('plani.perforacion', compact('items','poligonos'));

    }

    public function store(Request $request){

        $item = Perforacione::create($request->all());

          return back()->with('mensaje', 'Perforacion Resgistrada');
    }

    public function edit($id){

        $item = Perforacione::find($id);

        return view('plani.detallePerforacion', compact('item'));

    }

    public function update(Request $request, $id){

         $item = Perforacione::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Area Editada');
    }

    public function destroy(Request $request, $id){

         $item = Perforacione::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Area Eliminada');
    }
}
