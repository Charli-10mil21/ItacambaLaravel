<?php

namespace App\Imports;

use App\Models\Laboratorio;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LaboratorioImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    /* esto es para importar desde un xlsx sin cabeceras */
    // public function model(array $row)
    // {
    //     return new Laboratorio([
    //         'fecha' => Carbon::instance(Date::excelToDateTimeObject($row[0])),
    //         // 'fecha' => $row[0],
    //         'mg' => $row[1],
    //         'fe' => $row[2],
    //         'si' => $row[3],
    //         'al' => $row[4],
    //         'ca' => $row[5],
    //         'destino' => $row[6],
    //         'muestra_id' => $row[7],
    //         'blending_id' => $row[8],
    //     ]);
    // }

    public function model(array $row)
    {
        return new Laboratorio([
            'fecha' => Carbon::instance(Date::excelToDateTimeObject($row[0])),
            'SiO2' => $row[1],
            'Al2O3' => $row[2],
            'Fe2O3' => $row[3],
            'CaO' => $row[4],
            'MgO' => $row[5],
            'Na2O' => $row[6],
            'K2O' => $row[7],
            'Cl' => $row[8],
            'FSC' => $row[9],
            'MS' => $row[10],
            'MA' => $row[11],
            'destino' => $row[12],
            'muestra_id' => $row[13],
        ]);
    }

    // public function getCsvSettings(): array
    // {
    //     return [
    //         'delimiter' => ','
    //     ];
    // }
}
