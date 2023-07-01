<?php

namespace Database\Factories;

use App\Models\Poligono;
use App\Models\Topografia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poligono>
 */
class PoligonoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model =Poligono::class;

    public function definition()
    {

        static $number = 300;
        return [
            'nombre' => 'V' . $number++,
            'estado' => $this->faker->randomElement([' Material fragmentado','Perforando','Propuesto']),
            'topografia_id' => Topografia::inRandomOrder()->first()->id,
        ];
    }
}
