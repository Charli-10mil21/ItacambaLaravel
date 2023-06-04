<?php

namespace App\Exports;

use App\Models\Panele;
use App\Models\Parada;
use App\Models\Maquinaria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable; /* es para agregar el metodo de descargar en la clase y ya no poner en el panelControl */
use Maatwebsite\Excel\Concerns\WithCustomStartCell; /* es para la funcion startCell*/
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PanelExport implements FromView,WithCustomStartCell
{
    
    private $miVariable;
    public function __construct($id)
    {
        
        $this->miVariable = $id;
    }

    public function startCell(): string
    {
        return 'A5';
    }

    public function view(): View
    {
        
        $items= Panele::find($this->miVariable);
        $panel_id = $this->miVariable;
        $results = DB::select('CALL panel_central(?)', [$panel_id]);
        $viajes= $items->viajes;
        $paradas = Parada::all();
        $actividades= $items->actividades;
        $maquinarias = Maquinaria::all();
        $usoMaquinarias= $items->usoMaquinarias;
        return view('pro.excel_panelControl', compact('results','viajes','paradas','actividades','maquinarias','usoMaquinarias'));
    }

    
}
