<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquinaria;

class MaquinariaController extends Controller
{
    public function index(){

         $maquinarias = Maquinaria::paginate(5);
        return view('admin.Maquinaria', compact('maquinarias'));

    }

    public function store(Request $request){

        $maquinaria = Maquinaria::create($request->all());

          return back()->with('mensaje', 'Maquinaria Resgistrada');
    }

    public function edit($id){

        $maquinaria = Maquinaria::find($id);

        return view('admin.detalleMaquinaria', compact('maquinaria'));

    }

    public function update(Request $request, $id){

         $maquinaria = Maquinaria::findOrFail($id);
         $maquinaria->update($request->all());
          return back()->with('mensaje', 'Maquinaria Editada');
    }

    public function destroy(Request $request, $id){

         $maquinaria = Maquinaria::findOrFail($id);
         $maquinaria->delete();
          return back()->with('mensaje', 'Maquinaria Eliminada');
    }
}
