<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Explotacione;
use App\Models\Topografia;

class ExplotacioneController extends Controller
{
    public function index(){

         $items = Explotacione::paginate(5);
         $topografias = Topografia::all();
        return view('plani.explotacion', compact('items','topografias'));

    }

    public function store(Request $request){

        $item = Explotacione::create($request->all());

          return back()->with('mensaje', 'Explotacion Resgistrada');
    }

    public function edit($id){

        $item = Explotacione::find($id);
        $topografia= $item->topografia;

        return view('plani.detalleExplotacione', compact('item','topografia'));

    }

    public function update(Request $request, $id){

         $item = Explotacione::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Area Editada');
    }

    public function destroy(Request $request, $id){

         $item = Explotacione::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Area Eliminada');
    }
}
