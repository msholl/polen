<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producao>
 */
class ProducaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-2 days', '+2 days', 'America/Sao_Paulo');
        return [
            'sabor' => $this->faker->company,
            'quantidade' => $this->faker->numberBetween(1, 100),
            'data' => $date->format('Y-m-d'),
            'observacao' => $this->faker->text,

        ];
    }
}
