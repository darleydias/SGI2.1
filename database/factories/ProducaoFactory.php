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

        return [
            'produto_id'=>1,
            'qt'=>$this->faker->randomNumber(4, false),
            'opNum'=>$this->faker->randomNumber(5, false),
            'dataInicio'=>$this->faker->date(),
            'dataPrevista'=>$this->faker->date(),
            'dataEntrega'=>$this->faker->date(),
            'obs'=>$this->faker->sentence(30),
            'cliente_id'=>1
        ];
    }
}
