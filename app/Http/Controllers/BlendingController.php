<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blending;
use App\Models\Planificacion;
use App\Models\Topografia;
use Barryvdh\DomPDF\Facade\Pdf;

class BlendingController extends Controller
{
     public function index(){

         $items = Blending::paginate(5);
         $topografias = Topografia::all();
         $planificaciones= Planificacion::all();
        return view('plani.blending', compact('items','topografias','planificaciones'));
    }

    public function store(Request $request){

        $item = Blending::create($request->all());

          return back()->with('mensaje', 'Informe Resgistrado');
    }

    public function edit($id){

        $item = Blending::find($id);
        $plani= $item->planificacion;
        $topografia= $item->topografia;
        $poligono= $item->poligono;
        $laboratorios= $item->laboratorios;
        $topografias = Topografia::all();
        $planificaciones= Planificacion::all();

        return view('plani.detalleBlending', compact('item','plani','topografia','topografias','planificaciones','laboratorios','poligono'));

    }

    public function update(Request $request, $id){

         $item = Blending::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Informe Editado');
    }

    public function destroy(Request $request, $id){

         $item = Blending::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Informe Eliminado');
    }

    public function generar_pdf($id){
        $items= Blending::find($id);
        $plani= $items->planificacion;
        $topografia= $items->topografia;
        $laboratorios= $items->laboratorios;
        $pdf = pdf::loadView('plani.pdf_blending',compact('items','plani','topografia','laboratorios'));
        return $pdf->download('blending.pdf');

    }
}
