<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividade;

class ActividadeController extends Controller
{
    public function index(){

         

    }

    public function store(Request $request){

        $item = Actividade::create($request->all());

          return back()->with('mensaje', 'Actividad Resgistrada');
    }

    public function edit($id){

        $item = Actividade::find($id);

        return view('pro.detalleActividad', compact('item'));

    }

    public function update(Request $request, $id){

         $item = Actividade::findOrFail($id);
         $item->update($request->all());
         $horaIni = $item->horaIni;
         $horaFin = $item->horaFin;
         // Calcular la diferencia de tiempo
         $duracion = strtotime($horaFin) - strtotime($horaIni);
         // Convertir la diferencia de tiempo a formato horas:minutos:segundos
         $duracionFormateada = gmdate("H:i:s", $duracion);
         $item->duracion = $duracionFormateada;
         $item->save();
          return back()->with('mensaje', 'Actividad Editada');
    }

    public function destroy(Request $request, $id){

         $item = Actividade::findOrFail($id);
         $item->delete();
          return back()->with('mensaje', 'Actividad Eliminada');
    }
}
