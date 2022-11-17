<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topografia;

class TopografiaController extends Controller
{
    public function index(){

         $items = Topografia::paginate(5);
        return view('plani.topografia', compact('items'));

    }

    public function store(Request $request){

        $item = Topografia::create($request->all());

          return back()->with('mensaje', 'Area Resgistrada');
    }

    public function edit($id){

        $item = Topografia::find($id);
        $explotaciones = $item->explotaciones;
        $poligonos = $item->poligonos;

        return view('plani.detalleTopografia', compact('item','explotaciones','poligonos'));

    }

    public function update(Request $request, $id){

         $item = Topografia::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Area Editada');
    }

    public function destroy(Request $request, $id){

         $item = Topografia::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Area Eliminada');
    }
}
