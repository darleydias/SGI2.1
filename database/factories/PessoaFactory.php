<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomeCompleto'=>$this->faker->name,
            'sexo'=>"m",
            'dtNasc'=>$this->faker->date(),
            'CPF'=>$this->faker->randomNumber(5, false),
            'email'=>$this->faker->email,
            'celular'=>$this->faker->phoneNumber(),
            'id_setor'=>$this->faker->randomNumber(1, false)
        ];
    }
}
