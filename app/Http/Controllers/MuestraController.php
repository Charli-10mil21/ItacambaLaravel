<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muestra;
use App\Models\Perforacione;
use App\Models\Materia;
use App\Models\Poligono;



class MuestraController extends Controller
{
    public function index(){

         $items = Muestra::paginate(5);
         $materias= Materia::all();
         $poligonos= Poligono::all();
        return view('plani.muestra', compact('items','materias','poligonos'));

    }

    public function store(Request $request){

        $item = Muestra::create($request->all());

          return back()->with('mensaje', 'Muestra Resgistrada');
    }

    public function edit($id){

        $item = Muestra::find($id);
        $materia= $item->materia;
        $perforacion= $item->perforacion;
        $poligono = $item->poligono;
        return view('plani.detalleMuestra', compact('item','materia','perforacion','poligono'));

    }

    public function update(Request $request, $id){

         $item = Muestra::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Muestra Editada');
    }

    public function destroy(Request $request, $id){

         $item = Muestra::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Muestra Eliminada');
    }
}
