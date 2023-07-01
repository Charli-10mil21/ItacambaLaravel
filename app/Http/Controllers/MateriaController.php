<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;


class MateriaController extends Controller
{
    public function index(){

         $items = Materia::paginate(5);
        return view('plani.materia', compact('items'));

    }

    public function store(Request $request){

        $item = Materia::create($request->all());

          return back()->with('mensaje', 'Materia Prima Resgistrada');
    }

    public function edit($id){

        $item = Materia::find($id);
        
        return view('plani.detalleMateria', compact('item'));

    }

    public function update(Request $request, $id){

         $item = Materia::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje','Materia Editada');
    }

    public function destroy(Request $request, $id){

         $item = Materia::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Materia Eliminada');
    }
}
