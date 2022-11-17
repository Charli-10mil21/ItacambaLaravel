<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parada;

class ParadaController extends Controller
{
     public function index(){

         $items = Parada::paginate(5);
        return view('pro.Parada', compact('items'));

    }

    public function store(Request $request){

        $item = Parada::create($request->all());

          return back()->with('mensaje', 'Parada Resgistrada');
    }

    public function edit($id){

        $item = Parada::find($id);

        return view('pro.detalleParada', compact('item'));

    }

    public function update(Request $request, $id){

         $item = Parada::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Parada Editada');
    }

    public function destroy(Request $request, $id){

         $item = Parada::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Parada Eliminada');
    }
}
