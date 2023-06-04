<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescBlending;

class DescBlendingController extends Controller
{
    public function index(){

        $items = DescBlending::paginate(5);
       return view('plani.detalleBlending', compact('items'));
    }

    public function store(Request $request){

    $item = DescBlending::create($request->all());

      return back()->with('mensaje', 'Informe Resgistrado');
    }
    public function edit($id){

        $item = DescBlending::find($id);
        
        return view('plani.descBlending', compact('item'));

    }
    public function update(Request $request, $id){

        $item = DescBlending::findOrFail($id);
        $item->update($request->all());
         return back()->with('mensaje', 'Descripcion Editada');
   }

   public function destroy(Request $request, $id){

        $item = DescBlending::findOrFail($id);
        $item->delete();
         return back()->with('mensaje', 'Descripcion Eliminada');
   }
}
