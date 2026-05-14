<?php

namespace Database\Factories;

use App\Models\Citas;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'titulo' => Citas::factory(),
            'fecha' => fake()->date(),
            'hora' => fake()->time(),
            'descripcion' => fake()->paragraph(),
        ];
    }
}
