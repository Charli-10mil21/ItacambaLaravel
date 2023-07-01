<?php

namespace Database\Seeders;

use App\Models\Turno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turno = new Turno();
        $turno->name = 'Diurno';
        $turno->horario = '7:00 am - 16:00 pm';
        $turno->save();

        $turno1 = new Turno();
        $turno1->name = 'Nocturno';
        $turno1->horario = '16:00 pm - 11:59 pm';
        $turno1->save();
    }
}
