<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Volqueta;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Volqueta>
 */
class VolquetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model =Volqueta::class;

    public function definition()
    {
        return [
            'responsable' => $this->faker->name(),
            'placa' => Str::random(10),
            'pesoTara' => Str::random(10),
            'area' => $this->faker->randomElement(['Planificacion','Produccion','Expedicion']),
            'estado' => $this->faker->randomElement(['Disponible','En uso','Mantenimiento']),

        ];
    }
}
