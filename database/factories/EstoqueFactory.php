<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sabor' => $this->faker->colorName,
            'quantidade' => $this->faker->numberBetween(1, 100),
            'embalagem_id' => $this->faker->randomElement([1, 2, 3])
        ];
    }
}
