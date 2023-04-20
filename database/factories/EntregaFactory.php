<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrega>
 */
class EntregaFactory extends Factory
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
            'nome' => $this->faker->company,
            'bairro' => $this->faker->city,
            'data_entrega' => $date->format('Y-m-d'),
        ];
    }
}
