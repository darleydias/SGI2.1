<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servico>
 */
class ServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'id_produto'=>1,
            'id_responsavel'=>1,
            'id_tipoServico'=>1,
            'dtInicio'=>$this->faker->date(),
            'id_setorExecutante'=>1,
            'dtFim'=>$this->faker->date(),
            'quantIni'=>$this->faker->randomNumber(4, false),
            'quantFim'=>$this->faker->randomNumber(4, false)
        ];
    }
}
