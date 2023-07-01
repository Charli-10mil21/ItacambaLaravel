<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planificacion;
use App\Models\User;
use App\Charts\graficaProduccion;
use Illuminate\Support\Facades\DB;
use App\Models\Produccione;

class InformePlaniController extends Controller
{
    public function index(){
        $users = User::all();
        $presuTotal = Planificacion::sum('presupuesto');
        $toneladasTotal = Planificacion::sum('toneladas_t');
        $viajesTotal = Planificacion::sum('viajes_T');

        return view('admin.InformePlanificacion', compact('users','presuTotal','toneladasTotal','viajesTotal'));
    }

    public function produccion(){
        $produccionTotal = DB::select('SELECT * FROM suma_producciones'); 
        $data = Produccione::pluck( 'T_produccion', 'fecha');
        $title = 'Produccion por Fecha';
        $chart = new graficaProduccion;
        
        $chart->labels($data->keys());
        $chart->dataset($title, 'line', $data->values())->color('blue');

        return view('admin.informeProduccion',compact('chart','produccionTotal'));

    }

    // public function all(Request $request){
    //     $planificaciones = Planificacion::all();
    //     return response(json_encode($planificaciones),200)->header('Content-type','text/plain');
    // }

    // public function pro(Request $request){
    //     $producciones = Produccione::all();
    //     return response(json_encode($producciones),200)->header('Content-type','text/plain');
    // }

    // public function poli(Request $request){
    //     $areas = Topografia::get('area');
    //     $poligonos = Poligono::all();
    //     $result = [$areas,$poligonos];

    //     return response(json_encode($poligonos),200)->header('Content-type','text/plain');
    // }


    // public function InformesDes($id)
    // {
    //     $item = Planificacion::find($id);
    //     $user= $item->user;
    //     $blendings= $item->blendings;
    //     return view('admin.InformePlaniDetalle',compact('item','user','blendings'));
    // }

    // public function Blending(Request $request){
    //     $blend = Blending::where("planificacion_id","=",1)->get();
    //     $res = response(json_encode($blend),200)->header('Content-type','text/plain');

    //     return $res;

    //     //mañana intentar poner el res fuera del compact igual que en el blending function

    // }
}
