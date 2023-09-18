<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->words(2,true),
            'desc'=>$this->faker->sentence(30),
            'cod'=>$this->faker->randomNumber(5, false),
            'tipoProduto_id'=>1,
        ];
    }
}
