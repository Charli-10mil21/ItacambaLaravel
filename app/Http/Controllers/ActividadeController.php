<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividade;

class ActividadeController extends Controller
{
    public function index(){

         

    }

    public function store(Request $request){

        $item = Actividade::create($request->all());

          return back()->with('mensaje', 'Actividad Resgistrada');
    }

    public function edit($id){

        $item = Actividade::find($id);

        return view('pro.detalleActividad', compact('item'));

    }

    public function update(Request $request, $id){

         $item = Actividade::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Actividad Editada');
    }

    public function destroy(Request $request, $id){

         $item = Actividade::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Actividad Eliminada');
    }
}
