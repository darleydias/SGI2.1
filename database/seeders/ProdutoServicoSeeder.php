<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProdutoServico;

class ProdutoServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $produtoServico = array(
            array(1,1,1,30,5),
            array(1,2,1,200,16),
            array(1,3,1,200,12),
            array(1,4,1,200,12),
            array(1,5,2,800,23),
            array(1,6,2,200,2),
            array(1,1,2,500,1),
            array(1,2,3,200,18),
            array(1,3,3,200,10),
            array(1,4,3,300,21),
            array(1,5,4,200,10),
            array(1,6,4,200,15),
            array(1,1,4,200,14),
            array(1,2,4,200,10),
            array(1,3,5,200,8),
            array(1,4,5,200,10),
            array(1,5,5,200,7),
            array(1,5,5,200,10),
            array(1,5,5,200,10),
            array(1,5,6,200,7),
            array(1,5,6,200,6),
            array(1,5,6,200,4),
            array(1,5,6,200,12)


        );
        for($i=0;$i<count($produtoServico);$i++){
            ProdutoServico::create([
                'produto_id' => $produtoServico[$i][0],
                'servico_id' => $produtoServico[$i][1],
                'setor_id' => $produtoServico[$i][2],
                'quant' => $produtoServico[$i][3],
                'tempoMedioMin' => $produtoServico[$i][4]
            ]);
        }
    }
}
