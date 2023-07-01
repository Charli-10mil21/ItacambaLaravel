<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;
use App\Models\Volqueta;
use Illuminate\Support\Facades\DB;
use App\Charts\grafDetalleNivel;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $viajesTotal = DB::select('CALL sum_viajes_volqueta(?)', [$id]);
        $descrViajes = $volqueta->viajes;

        $nivel1 = 145;
        $nivel2 = 160;
        $nivel3 = 170;
        $nivel4 = 180;
        $nivel5 = 190;

        $data = Viaje::where('volqueta_id', $id)->where('nivel', $nivel1)->sum('n_viajes');
        $data2 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel2)->sum('n_viajes');
        $data3 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel3)->sum('n_viajes');
        $data4 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel4)->sum('n_viajes');
        $data5 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel5)->sum('n_viajes');
        $chart = new grafDetalleNivel;
        $chart->labels(['Nivel 145', 'Nivel 160', 'Nivel 170', 'Nivel 180', 'Nivel 190']);
        $chart->dataset('Cantidad de Viajes por Nivel', 'pie', [$data, $data2,$data3, $data4,$data5])->backgroundColor(['blue', 'green','red','pink','yellow']);

        return view('admin.detalleVolqueta', compact('volqueta','viajesTotal','chart','descrViajes'));

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

    public function generar_pdf($id){
        $item= Volqueta::find($id);
        $viajesTotal = DB::select('CALL sum_viajes_volqueta(?)', [$id]);
        $fechaActual = date('d-m-Y');

        $nivel1 = 145;
        $nivel2 = 160;
        $nivel3 = 170;
        $nivel4 = 180;
        $nivel5 = 190;

        $data = Viaje::where('volqueta_id', $id)->where('nivel', $nivel1)->sum('n_viajes');
        $data2 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel2)->sum('n_viajes');
        $data3 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel3)->sum('n_viajes');
        $data4 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel4)->sum('n_viajes');
        $data5 = Viaje::where('volqueta_id', $id)->where('nivel', $nivel5)->sum('n_viajes');

        $pdf = pdf::loadView('admin.pdf_volqueta',compact('item','data','data2','data3','data4','data5','viajesTotal','fechaActual'));
        return $pdf->download($fechaActual.'volqueta.pdf ');

    }
}
