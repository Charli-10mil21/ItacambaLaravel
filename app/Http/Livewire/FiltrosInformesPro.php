<?php

namespace App\Http\Livewire;

use App\Exports\informeProExport;
use Livewire\Component;
use App\Models\Produccione;
use App\Models\Blending;


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
        
        return view('livewire.filtros-informes-pro', compact('items','blendings') );
    }
}
