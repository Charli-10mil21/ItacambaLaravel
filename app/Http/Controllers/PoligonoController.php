<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poligono;
use App\Models\Topografia;
class PoligonoController extends Controller
{
    public function index(){

         $items = Poligono::paginate(5);
         $topografias = Topografia::all();
        return view('plani.poligono', compact('items','topografias'));

    }

    public function store(Request $request){

        $item = Poligono::create($request->all());

          return back()->with('mensaje', 'Poligono Resgistrado');
    }

    public function edit($id){

        $item = Poligono::find($id);
        $topografia= $item->topografia;
        $topografias = Topografia::all();
        $perforaciones = $item->muestras;
        

        return view('plani.detallePoligono', compact('item','topografia','topografias','perforaciones'));

    }

    public function update(Request $request, $id){

         $item = Poligono::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Poligono Editado');
    }

    public function destroy(Request $request, $id){

         $item = Poligono::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Poligono Eliminado');
    }
}
