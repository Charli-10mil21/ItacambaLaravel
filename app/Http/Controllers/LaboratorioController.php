<?php

namespace App\Http\Controllers;

use App\Imports\LaboratorioImport;
use Illuminate\Http\Request;
use App\Models\Laboratorio;
use App\Models\Muestra;
use App\Models\Blending;
use Maatwebsite\Excel\Facades\Excel;


class LaboratorioController extends Controller
{
    public function index(){

         $items = Laboratorio::paginate(5);
         $muestras= Muestra::all();
         $blendings= Blending::all();
        return view('plani.laboratorio', compact('items','muestras','blendings'));

    }

    public function store(Request $request){

        $item = Laboratorio::create($request->all());

          return back()->with('mensaje', 'Informe Resgistrado');
    }

    public function edit($id){

        $item = Laboratorio::find($id);
        $muestra= $item->muestra;
        $blending= $item->blending;

        return view('plani.detalleLaboratorio', compact('item','muestra','blending'));

    }

    public function update(Request $request, $id){

         $item = Laboratorio::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Informe Editado');
    }

    public function destroy(Request $request, $id){

         $item = Laboratorio::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Informe Eliminado');
    }

    public function importarStore(Request $request){

        $file = null;
        $request->validate([
            'file' => 'required|mimes:csv,xlsx'
        ]);

        $file =$request->file('file');

        
        // return Excel::toCollection(new LaboratorioImport, $file);
        Excel::import(new LaboratorioImport, $file);
         return back()->with('mensaje', 'exito');
   }

}
