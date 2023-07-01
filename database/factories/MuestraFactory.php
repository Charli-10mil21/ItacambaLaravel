<?php

namespace Database\Factories;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Poligono;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Muestra>
 */
class MuestraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model =Muestra::class;
    public function definition()
    {
        static $number = 10;
        return [
            'codigo' => 'P'. $number,
            'coordenadas' => $this->faker->numberBetween(10, 100).'° '.$this->faker->numberBetween(10, 100).'° '.$this->faker->numberBetween(10, 100).'° ',
            'profundidad' => $this->faker->numberBetween(100, 300).'m',
            'codigoM' => 'M'. $number++,
            'poligono_id' => Poligono::inRandomOrder()->first()->id,
        ];
    }
}
