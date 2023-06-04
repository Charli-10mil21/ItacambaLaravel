<?php

namespace App\Http\Controllers;

use App\Exports\ProduccionExport;
use App\Models\Blending;
use App\Models\Panele;
use Illuminate\Http\Request;
use App\Models\Produccione;
use App\Models\Turno;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ProduccioneController extends Controller
{
    public function index(){

         $items = Produccione::paginate(5);
         $blendings= Blending::all();
        return view('pro.produccion', compact('items', 'blendings'));

    }

    public function grafica(){
        $items = Produccione::all();
        $blendings= Blending::all();
        return view('admin.informeProduccion', compact('items', 'blendings'));

    }

    public function store(Request $request){

        $item = Produccione::create($request->all());

          return back()->with('mensaje', 'Produccion Resgistrada');
    }

    public function edit($id){

        $item = Produccione::find($id);
        $paneles= $item->paneles;
        $turnos = Turno::all();
        return view('pro.detalleProduccion', compact('item', 'paneles','turnos'));
    }

    public function update(Request $request, $id){

         $item = Produccione::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Informe Editado');
    }

    public function destroy(Request $request, $id){

         $item = Produccione::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Informe Eliminado');
    }

    public function actualizar($id){

        $item = Produccione::find($id);
        $viajesT = Panele::where('produccione_id', $id)->sum('N_viajes');
        $produccionT = Panele::where('produccione_id', $id)->sum('toneladas_total');
        $HorasT = Panele::where('produccione_id', $id)->sum('HorasT');
        $HorasEfe = Panele::where('produccione_id', $id)->sum('HorasEfectivas');
        $balanzaT = Panele::where('produccione_id', $id)->sum('balanza');
        $segundos = $HorasEfe /10000 ;
        $productividad = $produccionT / $segundos;
        $item->T_viajes = $viajesT;
        $item->T_produccion = $produccionT;
        $item->T_horas= $HorasT;
        $item->H_efectivas= $HorasEfe;
        $item->productividad=$productividad;
        $item->T_balanza = $balanzaT;
        $item->save();
        return back()->with('mensaje', 'se actualizo informe '. $segundos );
    }

    public function generar_pdf($id){
        $items= Produccione::find($id);
        // $panel_id = $id;
        // $results = DB::select('CALL panel_central(?)', [$panel_id]);
        // $viajes= $items->viajes;
        // $paradas = Parada::all();
        // $actividades= $items->actividades;
        // $maquinarias = Maquinaria::all();
        // $usoMaquinarias= $items->usoMaquinarias;
        $paneles= $items->paneles;
        $turnos = Turno::all();
        $blendings = Blending::all();
        $pdf = pdf::loadView('pro.pdf_produccion',compact('items', 'paneles','turnos','blendings'));
        return $pdf->download($items->fecha.'Produccion.pdf');
    }

    public function generar_excel($id){
        $items= Produccione::find($id);
        return Excel::download(new ProduccionExport($id), $items->fecha.'produccion.xlsx');
    }

}
