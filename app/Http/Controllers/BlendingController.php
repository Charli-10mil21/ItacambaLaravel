<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blending;
use App\Models\DescBlending;
use App\Models\Laboratorio;
use App\Models\Materia;
use App\Models\Topografia;
use App\Models\Planificacion;
use App\Models\Poligono;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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

    // public function guardar(Request $request){

        
    //     $blending = new Blending();


    //     $blending->codigo = $request->codigo;
    //     $blending->fecha = $request->fecha;
    //     $blending->fsc = $request->fsc;
    //     $blending->ms = $request->ms;
    //     $blending->ma = $request->ma;
    //     $blending->toneladas = $request->toneladas;
    //     $blending->viajes = $request->viajes;
    //     $blending->planificacion_id = $request->planificacion_id;
    //     $blending->save();
    //     //esta funcion es de tinker de laravel qeu sirve para guardar una variable con la relacion muchos a muchos
    //     $blending->topografias()->attach($request->topografia_id);

    //     $blending->save();




    //     return back()->with('mensaje', 'blending Resgistrado');
    // }

    public function edit($id){

        $item = Blending::find($id);
        $materiales = Materia::all();
        $filtroslab = DB::table('filtros_lab')->paginate(10);
        $laboratorios= Laboratorio::latest()->get();
        $topografias = Topografia::latest()->get();
        $planificaciones= Planificacion::latest()->get();
        $descripciones = DB::select('CALL blending_desc(?)', [$id]);
        $blendingsTotal = DB::select('CALL sum_blending(?)', [$id]);
        $item->FSC_total = $blendingsTotal[0]->FSC_total;
        $item->MS_total = $blendingsTotal[0]->MS_total;
        $item->MA_total = $blendingsTotal[0]->MA_total;
        $item->toneladas_total = $blendingsTotal[0]->toneladas_total;
        $item->viajes_total = $blendingsTotal[0]->viajes_total;
        $item->save(); 
        $poligonos = Poligono::latest()->get();

        return view('plani.detalleBlending', compact('item','topografias','planificaciones','laboratorios','materiales','poligonos','descripciones','filtroslab','blendingsTotal'));

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
        $item= Blending::find($id);
        $descripciones = DB::select('CALL blending_desc(?)', [$id]);
        $blendingsTotal = DB::select('CALL sum_blending(?)', [$id]);
        $pdf = pdf::loadView('plani.pdf_blending',compact('item','descripciones','blendingsTotal'));
        return $pdf->download('blending.pdf');

    }
}
