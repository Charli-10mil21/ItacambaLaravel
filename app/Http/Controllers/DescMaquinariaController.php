<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescMaquinaria;
use App\Models\Maquinaria;
use Carbon\Carbon;
use DateTime;
use DateInterval;

class DescMaquinariaController extends Controller
{
    public function index(){


   }

   public function store(Request $request){

       $item = DescMaquinaria::create($request->all());

         return back()->with('mensaje', 'Resgistrado');
   }

   public function edit($id){

       $item = DescMaquinaria::find($id);

       return back()->with('mensaje', 'Area Resgistrada');

   }

   public function update(Request $request, $id){

        $item = DescMaquinaria::findOrFail($id);
        $maquina = Maquinaria::find($item->maquinaria_id);

        $item->update($request->all());

        $hora1 = $maquina->horasA; // Hora en formato de time
        $hora2 = $item->horaUso; // Hora en formato de time

        $fecha1 = new DateTime($hora1); // Convertimos $hora1 en un objeto DateTime
        $fecha2 = new DateTime($hora2); // Convertimos $hora2 en un objeto DateTime

        $dateInterval = new DateInterval('PT'.$fecha2->format('H').'H'.$fecha2->format('i').'M'); // Creamos un objeto DateInterval a partir de la hora de $fecha2
        date_add($fecha1, $dateInterval); // Sumamos el objeto DateInterval a $fecha1

        $maquina->horasA = $fecha1->format('H:i:s'); // Convertimos el resultado a formato de hora
        
        $maquina->save();



        /*usando carbon */

        // $hora1 = $maquina->horasA; // Hora en formato de time
        // $hora2 = $item->horaUso; // Hora en formato de time

        // if (substr($hora1, 3, 1) === ':') {
        //     $hora1 = substr_replace($hora1, '0', 3, 0);
        // }
        // if (substr($hora2, 3, 1) === ':') {
        //     $hora2 = substr_replace($hora2, '0', 3, 0);
        // }

        // $fecha1 = Carbon::createFromFormat('H:i:s', $hora1); // Convertimos $hora1 en un objeto Carbon
        // $fecha2 = Carbon::createFromFormat('H:i:s', $hora2); // Convertimos $hora2 en un objeto Carbon

        // $fecha1->addHours($fecha2->hour)->addMinutes($fecha2->minute); // Sumamos las horas y minutos de $fecha2 a $fecha1

        // $maquina->horasA = $fecha1->format('H:i:s'); // Convertimos el resultado a formato de hora

        // $maquina->save();
        
         return back()->with('mensaje', 'Registro Editado');
   }


   public function destroy(Request $request, $id){

        $item = DescMaquinaria::findOrFail($id);
        $item->delete();
         return back()->with('mensaje', 'Registro Eliminado');
   }
}
