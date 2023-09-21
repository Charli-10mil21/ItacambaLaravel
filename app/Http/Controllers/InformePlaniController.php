<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planificacion;
use App\Models\User;
use App\Charts\graficaProduccion;
use Illuminate\Support\Facades\DB;
use App\Models\Produccione;
use App\Models\Blending;

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
        $toneladas_totales = Produccione::sum('T_produccion');
        $totalHorasTrabajadas = DB::table('producciones')
        ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(T_horas))) as total_horas_trabajadas'))
        ->get();

        $horas_trabajadas_totales = $totalHorasTrabajadas[0]->total_horas_trabajadas;

        
        // $horas_trabajadas_totales = Produccione::sum('T_horas');

        $totalHorasEfectivas = DB::table('producciones')
        ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(H_efectivas))) as total_horas_efectivas'))
        ->get();

        $horas_efectivas_totales = $totalHorasEfectivas[0]->total_horas_efectivas;
        // $horas_efectivas_totales = Produccione::sum('H_efectivas');
        $data = Produccione::pluck( 'T_produccion', 'fecha');
        $title = 'Produccion por Fecha';
        $chart = new graficaProduccion;
        
        $chart->labels($data->keys());
        $chart->dataset($title, 'line', $data->values())->color('blue');

        return view('admin.informeProduccion',compact('chart','toneladas_totales','horas_trabajadas_totales','horas_efectivas_totales'));

    }

    public function conciliacion(){
        $toneladas_totales = Produccione::sum('T_produccion');

        $totalHorasTrabajadas = DB::table('producciones')
        ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(T_horas))) as total_horas_trabajadas'))
        ->get();

        $horas_trabajadas_totales = $totalHorasTrabajadas[0]->total_horas_trabajadas;

        
        // $horas_trabajadas_totales = Produccione::sum('T_horas');

        $totalHorasEfectivas = DB::table('producciones')
        ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(H_efectivas))) as total_horas_efectivas'))
        ->get();

        $horas_efectivas_totales = $totalHorasEfectivas[0]->total_horas_efectivas;
        // $horas_efectivas_totales = Produccione::sum('H_efectivas');
        $data = Produccione::pluck( 'T_produccion', 'fecha');
        $data2 = Blending::pluck( 'toneladas_total', 'fecha');
        $presuTotal = Planificacion::sum('presupuesto');
        $toneladasTotal = Planificacion::sum('toneladas_t');
        $title1 = 'Produccion';
        $title2 = 'Planificacion';
        $chart = new graficaProduccion;
        
        $chart->labels($data->keys());
        $chart->labels($data2->keys());
        $chart->dataset($title1, 'line', $data->values())->color('blue');
        $chart->dataset($title2, 'line', $data2->values())->color('red');

        return view('admin.informeConciliacion',compact('chart','presuTotal','toneladasTotal','toneladas_totales','horas_trabajadas_totales','horas_efectivas_totales'));

    }

    
}
