<?php

namespace App\Exports;

use App\Models\Produccione;
use App\Models\Turno;
use App\Models\Blending;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProduccionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $miVariable;
    public function __construct($id)
    {
        
        $this->miVariable = $id;
    }

    public function view(): View
    {
        $items= Produccione::find($this->miVariable);
        $paneles= $items->paneles;
        $turnos = Turno::all();
        $blendings = Blending::all();
        return view('pro.excel_produccion', compact('items', 'paneles','turnos','blendings'));
    }
}
