<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->nombre = 'Carlos Alberto';
        $user->apellido = 'Martinez Velasco';
        $user->email = 'carlos@gmail.com';
        $user->password = '1234';
        $user->campo = 'Administracion';
        $user->telefono = '78723126';

        $user->save();
    }
}
