<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquinaria;
use Illuminate\Support\Facades\DB;
use App\Charts\grafMaquinariaUso;
use App\Models\DescMaquinaria;

class MaquinariaController extends Controller
{
    public function index(){

         $maquinarias = Maquinaria::paginate(5);
        return view('admin.Maquinaria', compact('maquinarias'));

    }

    public function store(Request $request){

        $maquinaria = Maquinaria::create($request->all());

          return back()->with('mensaje', 'Maquinaria Resgistrada');
    }

    public function edit($id){

        $maquinaria = Maquinaria::find($id);
        $maquinariaUso = DB::select('CALL calcu_maquinaria_horas(?)', [$id]);
        $horaUso = DescMaquinaria::where('maquinaria_id', $id)->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(horaUso)))'))->value('SEC_TO_TIME(SUM(TIME_TO_SEC(horaUso)))');
         $maquinaria->horasA = $horaUso;
         $maquinaria->save();
        $data = collect($maquinariaUso)->pluck('HoraUso', 'fecha');
        $chart = new grafMaquinariaUso;
        $chart->labels($data->keys());
        $chart->dataset('HorasUso', 'line', $data->values())->color('blue');

        return view('admin.detalleMaquinaria', compact('maquinaria','maquinariaUso','chart'));

    }

    public function update(Request $request, $id){

         $maquinaria = Maquinaria::findOrFail($id);
         
         $maquinaria->update($request->all());
          return back()->with('mensaje', 'Maquinaria Editada');
    }

    public function destroy(Request $request, $id){

         $maquinaria = Maquinaria::findOrFail($id);
         $maquinaria->delete();
          return back()->with('mensaje', 'Maquinaria Eliminada');
    }
}
