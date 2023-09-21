<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Topografia;
use App\Models\Poligono;

class FilterLaboratorios extends Component
{
    public $filters = [
        'topografia_id' => '',
        'poligono_id' => '',
        'fromdate' => '',
        'todate' => '',
    ];
    public function render()
    {
        // $filtroslab = DB::table('filtros_lab')->paginate(10);
    $query = DB::table('filtros_lab');

    // Aplicar los filtros si tienen valores
    if ($this->filters['topografia_id']) {
        $query->where('area', $this->filters['topografia_id']);
    }

    if ($this->filters['poligono_id']) {
        $query->where('voladura', $this->filters['poligono_id']);
    }

    if ($this->filters['fromdate']) {
        $query->where('fecha', '>=', $this->filters['fromdate']);
    }

    if ($this->filters['todate']) {
        $query->where('fecha', '<=', $this->filters['todate']);
    }

    $filtroslab = $query->paginate(10);
    $topografias = Topografia::latest()->get();
    $poligonos = Poligono::latest()->get();
        return view('livewire.filter-laboratorios',compact('filtroslab','topografias','poligonos'));
    }

}
