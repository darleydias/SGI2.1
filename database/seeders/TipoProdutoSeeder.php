<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoProduto;

class TipoProdutoSeeder extends Seeder
{
    public function run(): void
    {
        static $produtos = array(
            array("Case"),
            array("Suportes"),
            array("Bases"),
            array("Carregadores"),
            array("Hubs","Hub x")
        );
        for($i=0;$i<5;$i++){
            TipoProduto::create([
                'nome' => $produtos[$i][0]
            ]);
        }
    }
}
