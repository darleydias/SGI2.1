<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SetorExecutante>
 */
class SetorExecutanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_setor'=>1,
            'id_producao'=>1,
            'dtInicio'=>$this->faker->date(),
            'dtFim'=>$this->faker->date(),
            'quantIni'=>$this->faker->randomNumber(4, false),
            'quantAtual'=>$this->faker->randomNumber(4, false),
            'faltam'=>$this->faker->randomNumber(4, false),
        ];
    }
}
