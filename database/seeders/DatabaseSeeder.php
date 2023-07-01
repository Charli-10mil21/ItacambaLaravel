<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Muestra;
use Illuminate\Database\Seeder;
use App\Models\Volqueta;
use App\Models\Poligono;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // el codigo php artisan migrate:fresh --seed es para hacer ambos cambios a la vez elminar las tablas , actualizarlas y subir los datos que estan en el seeder

        $this->call(UserSeeder::class); //con esto nos permite subir datos mas especificos
        $this->call(MaquinariaSeeder::class);
        $this->call(TopografiaSeeder::class);
        $this->call(ParadaSeeder::class);
        $this->call(TurnoSeeder::class);
        Volqueta::factory(6)->create(); //con esto llamamos al factory
        Poligono::factory(10)->create();
        Muestra::factory(50)->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
