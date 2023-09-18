<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabalho>
 */
class TrabalhoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
     
        return [
            'id_executor'=>1,
            'id_servico'=>1,
            'tempoInicio'=>$this->faker->date(),
            'tempoFim'=>$this->faker->date(),
            'trabalhoPausa'=>1,
        ];
    }
}
