<?php

namespace Database\Seeders;

use App\Models\Parada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pa = new Parada();
        $pa->tipo = 'Programada'; 
        $pa->save();

        $pa1 = new Parada();
        $pa1->tipo = 'Inesperada'; 
        $pa1->save();

        $pa2 = new Parada();
        $pa2->tipo = 'Climatologica'; 
        $pa2->save();

    }
}
