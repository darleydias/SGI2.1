<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NotaFiscal>
 */
class NotaFiscalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idPedidoCompra'=>1,
            'nf_nomeOriginal'=>$this->faker->url('http'),
            'nf_hash'=>$this->faker->md5,
            'nf_tamanho'=>$this->faker->randomNumber(5, false),
            'nf_contentType'=>$this->faker->words(1,true),
            'nf_path'=>$this->faker->url('http')
        ];
    }
}
