<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => fake()->name(),
            'apellidos' => fake()->lastName(),
            'documento' => fake()->unique()->numberBetween(1000000, 9999999),
            'telefono' => fake()->numberBetween(3000000000, 3999999999),
            'direccion' => fake()->address(),
        ];
    }
}
