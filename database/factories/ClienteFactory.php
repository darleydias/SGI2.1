<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
use App\Models\Cliente;
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->name,
            'CNPJ'=>$this->faker->randomNumber(5, false),
            'cel'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email,
            'contato'=>$this->faker->name,
            'insEst'=>$this->faker->randomNumber(4, false),
            'insMun'=>$this->faker->randomNumber(4, false),
            'seguimento_id'=>1
        ];
    }
}
