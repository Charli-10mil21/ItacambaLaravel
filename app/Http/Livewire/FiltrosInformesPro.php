<?php

namespace App\Http\Livewire;

use App\Exports\informeProExport;
use Livewire\Component;
use App\Models\Produccione;
use App\Models\Blending;
use App\Charts\graficaProduccion;
use Illuminate\Support\Facades\DB;

class FiltrosInformesPro extends Component
{

    public $filters = [
        'blending_id' => '',
        'fromdate' => '',
        'todate' => '',
    ];


    public function generarReporte(){
        return new informeProExport($this->filters);
    }

    public function render()
    {
        $items = Produccione::filtro($this->filters)->paginate(5);
        $blendings= Blending::all();
        $produccionTotal = DB::select('SELECT * FROM suma_producciones'); ;
        $data = Produccione::pluck( 'T_produccion', 'fecha');
        $title = 'Produccion por Fecha';
        $chart = new graficaProduccion;
        $chart->labels($data->keys());
        $chart->dataset($title, 'line', $data->values())->color('blue');
        return view('livewire.filtros-informes-pro', compact('items','blendings','chart','produccionTotal') );
    }
}
