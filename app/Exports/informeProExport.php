<?php

namespace App\Exports;

use App\Models\Produccione;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable; /** con esto se descarga automaticamente sin llamar al metodo ->download() */
use Maatwebsite\Excel\Concerns\Exportable; /** funcionabilidades para poner las variables privadas y definir el nombre y el tipo de documento que se exportara */
use Maatwebsite\Excel\Concerns\WithCustomStartCell; /* para definir el inicio de celda*/
use Maatwebsite\Excel\Concerns\WithMapping;/** usa la funcion map() para determinar que valores se devolveran al exportar el archivo */
use Maatwebsite\Excel\Concerns\WithColumnFormatting; /** para pasar el formato de fecha que se desea mostrar */
use PhpOffice\PhpSpreadsheet\Shared\Date; /** para convertir a fecha que reconozca excel */
use Maatwebsite\Excel\Concerns\WithHeadings; /** para poner cabeceras a las columnas */
use Maatwebsite\Excel\Concerns\ShouldAutoSize;/** para que las celdas se ajusten al tamaño automaticamente */
use Maatwebsite\Excel\Concerns\WithDrawings;/** para usar logos*/ 
use Maatwebsite\Excel\Concerns\WithStyles; /** para agregar estilos  */
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class informeProExport implements FromCollection,WithCustomStartCell, Responsable, WithMapping, WithColumnFormatting, WithHeadings, ShouldAutoSize, WithDrawings, WithStyles
{
    use Exportable;
    private $filtros;
    private $fileName = 'ImformeProduccion.xlsx';
    private $writeType = Excel:: XLSX;

    public function __construct($filters)
    {
        $this->filtros = $filters;
    }



    public function collection()
    {
        return Produccione::filtro($this->filtros)->get();
    }

    public function startCell(): string
    {
        return 'A9';
    }

    public function headings():array
    {
        return [
            'Fecha',
            'Codigo Produccion',
            'Total Viajes',
            'Total horas',
            'Horas Efectivas',
            'Total Produccion',
            'Productividad',
            'Total Balanza',
        ];
    }

    public function map($produccione): array 
    {
        return [ 
        // Date::dateTimeToExcel($produccione->fecha),
        $produccione->fecha,
        $produccione->blending->codigo,
        $produccione->T_viajes,
        $produccione->T_horas,
        $produccione->H_efectivas,
        $produccione->T_produccion,
        $produccione->productividad,
        $produccione->T_balanza,
    ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => 'dd/mm/yyyy',
        ];
    }

    public function drawings()
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Itacamba');
        $drawing->setDescription('logo Itacamba');
        $drawing->setPath(public_path('img/logo2.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('C3');

        return $drawing;

    }

    public function styles(Worksheet $sheet)
    { 
        $sheet->setTitle('Produccion');
        // $sheet->mergeCells('B2:F2') es para combinar las celdas 
        // $sheet->setCellValue('B1', '=5+4') es para agregar formulas o valores predeterminados a una celda 
        $sheet->getStyle('A9:H9')->applyFromArray([
            'font' => [
                'bold' => true,
                'name' => 'Arial',
            ],
            'alignament' => [
                'horizontal' => 'center'
            ],
            'fill' => [
                'fillType' => 'solid', 'startColor' => ['argb' => '2A65AD']
            ],
        ]);

        $sheet->getStyle('A9:H'. $sheet->getHighestRow())->applyFromArray([        
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin', 
                ],
            ],

        ]);
        
        $sheet->getStyle('A9')->applyFromArray([ ]);

    }
}
