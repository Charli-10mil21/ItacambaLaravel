<?php

namespace App\Imports;

use App\Models\Laboratorio;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow; /** esto es para especificar que usa cabeceras */
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings; /** para la configuracion los separadores de campos en el csv */

class LaboratorioImport implements ToModel,WithGroupedHeadingRow,WithCustomCsvSettings
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
            // 'fecha' => Carbon::instance(Date::excelToDateTimeObject($row['fecha'])),
            'fecha' => $row['fecha'],
            'mg' => $row['mg'],
            'fe' => $row['fe'],
            'si' => $row['si'],
            'al' => $row['al'],
            'ca' => $row['ca'],
            'destino' => $row['destino'],
            'muestra_id' => $row['muestra_id'],
            'blending_id' => $row['blending_id'],
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
}
