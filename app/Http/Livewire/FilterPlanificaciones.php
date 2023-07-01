<?php

namespace App\Http\Livewire;

use App\Models\Planificacion;
use App\Models\User;
use Livewire\Component;

class FilterPlanificaciones extends Component
{
    public $filters = [
        'name' => '',
        'user' => '',
        'fromdate' => '',
        'todate' => '',
    ];
    public function render()
    {
        $items = Planificacion::filtro($this->filters)->paginate(5);
        $planificaciones = Planificacion::all();
        $usuarios = User::all();
        return view('livewire.filter-planificaciones', compact('items','planificaciones','usuarios'));
    }
}
