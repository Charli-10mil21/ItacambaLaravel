<?php

namespace App\Http\Livewire;

use App\Models\Blending;
use App\Models\Produccione;
use Livewire\Component;
use Livewire\WithPagination;

class FiltroProduccion extends Component
{
    

    public $fecha;

    use WithPagination;

    

    public function render()
    {
        $items = Produccione::filter($this->fecha)->paginate(5);
        $blendings = Blending::all();
        return view('livewire.filtro-produccion', compact('items','blendings'));
    }
}
