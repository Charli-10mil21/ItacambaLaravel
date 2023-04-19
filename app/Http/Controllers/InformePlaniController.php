<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planificacion;
use App\Models\User;
use App\Models\Topografia;
use App\Models\Poligono;
use App\Models\Explotacione;
use App\Models\Perforacione;
use App\Models\Laboratorio;
use App\Models\Blending;
use App\Models\Produccione;
use App\Models\Panele;


class InformePlaniController extends Controller
{
    public function index(){

        $topos = Topografia::paginate(5);
        $planis = Planificacion::paginate(5);
        $polis= Poligono::paginate(5);
        $explos= Explotacione::paginate(5);
        $perfor= Perforacione::paginate(5);
        $labs = Laboratorio::paginate(5);
        $blends= Blending::paginate(5);
        $users = User::all();
        return view('admin.InformePlanificacion', compact('planis','users','topos','polis','explos','perfor','labs','blends'));
    }

    public function produccion(){

        $producs = Produccione::paginate(5);
        $paneles = Panele::paginate(5);

        return view('admin.informeProduccion', compact('producs', 'paneles'));

    }

    public function all(Request $request){
        $planificaciones = Planificacion::all();
        return response(json_encode($planificaciones),200)->header('Content-type','text/plain');
    }

    public function pro(Request $request){
        $producciones = Produccione::all();
        return response(json_encode($producciones),200)->header('Content-type','text/plain');
    }

    public function poli(Request $request){
        $areas = Topografia::get('area');
        $poligonos = Poligono::all();
        $result = [$areas,$poligonos];

        return response(json_encode($poligonos),200)->header('Content-type','text/plain');
    }


    public function InformesDes($id)
    {
        $item = Planificacion::find($id);
        $user= $item->user;
        $blendings= $item->blendings;
        return view('admin.InformePlaniDetalle',compact('item','user','blendings'));
    }

    public function Blending(Request $request){
        $blend = Blending::where("planificacion_id","=",1)->get();
        $res = response(json_encode($blend),200)->header('Content-type','text/plain');

        return $res;

        //mañana intentar poner el res fuera del compact igual que en el blending function

    }
}
