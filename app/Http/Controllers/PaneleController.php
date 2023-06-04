<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Panele;
use App\Models\Maquinaria;
use App\Models\Parada;
use App\Models\Produccione;
use App\Models\Turno;
use App\Models\Volqueta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Exports\PanelExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class PaneleController extends Controller
{
    public function index(){

         $items = Panele::paginate(5);
         $turnos = Turno::all();
         $producciones = Produccione::all();
        return view('pro.panel_central', compact('items','turnos','producciones'));

    }

    public function store(Request $request){

        $item = Panele::create($request->all());

          return back()->with('mensaje', 'Panel Resgistrada');
    }

    public function edit($id){

        $item = Panele::find($id);
        $viajes = $item->viajes;
        $actividades = $item->actividades;
        $volquetas = Volqueta::all();
        $paradas = Parada::all();
        $maquinarias = Maquinaria::all();
        $producciones = Produccione::all();
        $turnos = Turno::all();
        $usoMaquinarias = $item->usoMaquinarias;

        return view('pro.detallePanel', compact('item','viajes','actividades','maquinarias','volquetas','paradas','usoMaquinarias','producciones','turnos'));

    }

    public function update(Request $request, $id){

         $item = Panele::findOrFail($id);
         $item->update($request->all());
         
          return back()->with('mensaje', 'Panel Editado');
    }

    public function destroy(Request $request, $id){

         $item = Panele::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Panel Eliminado');
    }

    public function generar_pdf($id){
        $items= Panele::find($id);
        $panel_id = $id;
        $results = DB::select('CALL panel_central(?)', [$panel_id]);
        $viajes= $items->viajes;
        $paradas = Parada::all();
        $actividades= $items->actividades;
        $maquinarias = Maquinaria::all();
        $usoMaquinarias= $items->usoMaquinarias;
        $pdf = pdf::loadView('pro.pdf_panelControl',compact('results','viajes','paradas','actividades','maquinarias','usoMaquinarias'));
        return $pdf->download('PanelControl.pdf');

    }

    public function generar_excel($id){

        
        /* si se quiere exportar en un archivo csv 
           return Excel::download(new \App\Exports\PanelExport($id), 'panelControlEx.csv', Maatwebsite\Excel\Excel::CSV );
        */ 
        return Excel::download(new PanelExport($id), 'panel.xlsx');

    }
}

