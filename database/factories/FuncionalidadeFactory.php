<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionalidade>
 */
class FuncionalidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return 
            ['nome'=>$this->faker->words(3,true),'URL'=>$this->faker->url('http'),'menu'=>1,'sistema_id'=>1]
        ;
    }
}
