<?php

namespace App\Http\Controllers;

use App\Charts\grafDetallePlanificacion;
use App\Models\Blending;
use Illuminate\Http\Request;
use App\Models\Planificacion;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PlanificacionController extends Controller
{
    public function index(){

         $items = Planificacion::paginate(5);
         $users = User::all();
        return view('plani.home', compact('items','users'));

    }

    public function store(Request $request){

        $item = Planificacion::create($request->all());

          return back()->with('mensaje', 'Planificacion Resgistrada');
    }

    public function edit($id){

        $item = Planificacion::find($id);
        $users = User::all();
        $blendings= $item->blendings;
        $planiTotal = DB::select('CALL sum_planificacion(?)', [$id]);
        $item->toneladas_t = $planiTotal[0]->toneladas_total;
        $item->viajes_t = $planiTotal[0]->viajes_total;
        $item->save();
        $data = Blending::where('planificacion_id',$id)->pluck( 'toneladas_total', 'fecha');
        $data2 = Blending::where('planificacion_id',$id)->pluck( 'viajes_total', 'fecha');
        $chart = new grafDetallePlanificacion;
        $chart2 = new grafDetallePlanificacion;
        $chart->labels($data->keys());
        $chart2->labels($data->keys());
        // $chart->options([
        //     'scales' => [
        //         'yAxes' => [
        //             [
        //                 'ticks' => [
        //                     'stepSize' => 100, // Establece el intervalo entre los números en el eje Y
        //                 ],
        //             ],
        //         ],
        //     ],
        // ]);
        $chart->dataset('Toneladas', 'line', $data->values())->color('blue');
        $chart2->dataset('Viajes', 'line', $data2->values())->color('green');
        
        return view('plani.detallePlanificacion', compact('item','users','blendings','planiTotal','chart','chart2'));
    }

    public function update(Request $request, $id){

         $item = Planificacion::findOrFail($id);
         $item->update($request->all());
          return back()->with('mensaje', 'Informe Editado');
    }

    public function destroy(Request $request, $id){

         $item = Planificacion::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Informe Eliminado');
    }

    public function generar_pdf($id){
        $item= Planificacion::find($id);
        $blendings= $item->blendings;
        $fechaActual = date('d-m-Y');

        $pdf = pdf::loadView('plani.pdf_detalle_plani',compact('item','blendings','fechaActual'));
        return $pdf->download($fechaActual.'planificacion.pdf');

    }
}
