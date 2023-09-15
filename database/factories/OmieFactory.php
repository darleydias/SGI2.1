<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Omie>
 */
class OmieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo'=>$this->faker->randomNumber(3, false),
            'descricao'=>$this->faker->words(4,true),
            'valor_unitario'=>$this->faker->randomFloat(2)
        ];
    }
}
