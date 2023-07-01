<?php

namespace Database\Seeders;

use App\Models\Maquinaria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaquinariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maquina = new Maquinaria();
        $maquina->nombre = 'Mandibula';
        $maquina->codigo = 'B2J01M1';
        $maquina->descripcion = 'Trituradora de Mandibulas de primer nivel';
        $maquina->estado = 'Disponible';
        $maquina->save();

        $maquina1 = new Maquinaria();
        $maquina1->nombre = 'Cono';
        $maquina1->codigo = 'B2J04M1';
        $maquina1->descripcion = 'Trituradora de cono de segundo nivel';
        $maquina1->estado = 'Disponible';
        $maquina1->save();

        $maquina2 = new Maquinaria();
        $maquina2->nombre = 'Alimentador';
        $maquina2->codigo = 'B2J05M1';
        $maquina2->descripcion = 'Alimentador para trasferir materiales a otro proceso';
        $maquina2->estado = 'Disponible';
        $maquina2->save();

        $maquina3 = new Maquinaria();
        $maquina3->nombre = 'Martillo';
        $maquina3->codigo = 'B2J07M1';
        $maquina3->descripcion = 'Trituradora martillo de ultimo nivel';
        $maquina3->estado = 'Disponible';
        $maquina3->save();

    }
}
