<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volqueta;

class VolquetaController extends Controller
{
    public function index(){

         $volquetas = Volqueta::paginate(5);
        return view('admin.volqueta', compact('volquetas'));

    }

    public function store(Request $request){

        $volqueta = Volqueta::create($request->all());

          return back()->with('mensaje', 'Volqueta Resgistrada');
    }

    public function edit($id){

        $volqueta = Volqueta::find($id);

        return view('admin.detalleVolqueta', compact('volqueta'));

    }

    public function update(Request $request, $id){

         $volqueta = Volqueta::findOrFail($id);
         $volqueta->update($request->all());
          return back()->with('mensaje', 'Volqueta Editada');
    }

    public function destroy(Request $request, $id){

         $volqueta = Volqueta::findOrFail($id);
         $volqueta->delete();
          return back()->with('mensaje', 'Volqueta Eliminada');
    }
}
