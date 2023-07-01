<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blending;
use App\Models\Materia;
use App\Models\Planificacion;

class FilterBlendings extends Component
{
    public $filters = [
        'codigo' => '',
        'fromdate' => '',
        'todate' => '',
    ];

    public function render()
    {   
        $items = Blending::filtro($this->filters)->latest()->paginate(5);
        $blendings = Blending::all();
        return view('livewire.filter-blendings' ,compact('items','blendings'));
    }
}
