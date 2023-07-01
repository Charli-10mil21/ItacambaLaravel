<?php

namespace Database\Seeders;

use App\Models\Topografia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopografiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topo = new Topografia();
        $topo->area = '145';
        $topo->levPuntos = '12500';
        $topo->replanPuntos = '15300';
        $topo->save();

        $topo1 = new Topografia();
        $topo1->area = '160';
        $topo1->levPuntos = '13500';
        $topo1->replanPuntos = '16300';
        $topo1->save();

        $topo2 = new Topografia();
        $topo2->area = '170';
        $topo2->levPuntos = '14500';
        $topo2->replanPuntos = '17300';
        $topo2->save();

        $topo3 = new Topografia();
        $topo3->area = '180';
        $topo3->levPuntos = '15500';
        $topo3->replanPuntos = '18300';
        $topo3->save();

        $topo4 = new Topografia();
        $topo4->area = '190';
        $topo4->levPuntos = '16500';
        $topo4->replanPuntos = '19300';
        $topo4->save();
    }
}
