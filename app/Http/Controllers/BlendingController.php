<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blending;
use App\Models\DescBlending;
use App\Models\Materia;
use App\Models\Topografia;
use App\Models\Planificacion;
use App\Models\Poligono;
use Barryvdh\DomPDF\Facade\Pdf;

class BlendingController extends Controller
{
     public function index(){

         $items = Blending::paginate(5);
         $materiales = Materia::all();
         $planificaciones= Planificacion::all();
        return view('plani.blending', compact('items','materiales','planificaciones'));
    }

    public function store(Request $request){

        $item = Blending::create($request->all());

          return back()->with('mensaje', 'Informe Resgistrado');
    }

    public function guardar(Request $request){

        
        $blending = new Blending();


        $blending->codigo = $request->codigo;
        $blending->fecha = $request->fecha;
        $blending->fsc = $request->fsc;
        $blending->ms = $request->ms;
        $blending->ma = $request->ma;
        $blending->toneladas = $request->toneladas;
        $blending->viajes = $request->viajes;
        $blending->planificacion_id = $request->planificacion_id;
        $blending->save();
        //esta funcion es de tinker de laravel qeu sirve para guardar una variable con la relacion muchos a muchos
        $blending->topografias()->attach($request->topografia_id);

        $blending->save();




        return back()->with('mensaje', 'blending Resgistrado');
    }

    public function edit($id){

        $item = Blending::find($id);
        $topografia = $item->topografias;
        $plani= $item->planificacion;
        
        // $topografia= $item->topografia;
        // $poligono= $item->poligono;
        $materiales = Materia::all();
        $laboratorios= $item->laboratorios;
        $topografias = Topografia::all();
        $planificaciones= Planificacion::all();
        $descripciones = DescBlending::paginate(5);
        $poligonos = Poligono::all();

        return view('plani.detalleBlending', compact('item','plani','topografias','planificaciones','laboratorios','topografia','materiales','poligonos','descripciones'));

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
