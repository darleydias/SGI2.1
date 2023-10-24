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
            array(1,1,1,3,480),
            array(1,2,1,1,480),
            array(1,3,1,2,480),
            array(1,4,1,3,960),
            array(1,5,2,1,960),
            array(1,6,2,1,480),
            array(1,1,2,1,960),
            array(1,2,3,1,240),
            array(1,3,3,1,480),
            array(1,4,3,1,960),
            array(1,5,4,1,480),
            array(1,6,4,1,960),
            array(1,1,4,1,480),
            array(1,2,4,1,480),
            array(1,3,5,2,960),
            array(1,4,5,2,960),
            array(1,5,5,3,960),
            array(1,5,5,2,480),
            array(1,5,5,1,480),
            array(1,5,6,1,960),
            array(1,5,6,1,480),
            array(1,5,6,2,960),
            array(2,1,1,2,960),
            array(2,2,1,3,960),
            array(2,3,1,2,960),
            array(2,4,1,2,960),
            array(2,5,2,1,960),
            array(2,6,2,1,960),
            array(2,1,2,1,960),
            array(2,2,3,2,240),
            array(2,3,3,3,240),
            array(2,4,3,2,240),
            array(2,5,4,1,240),
            array(2,6,4,1,240),
            array(2,1,4,2,240),
            array(2,2,4,2,240),
            array(2,3,5,2,240),
            array(2,4,5,2,240),
            array(2,5,5,2,240),
            array(2,5,5,1,240),
            array(2,5,5,1,240),
            array(2,5,6,1,240),
            array(2,5,6,1,240),
            array(2,5,6,1,240),
            array(2,5,6,1,240)


        );
        for($i=0;$i<count($produtoServico);$i++){
            ProdutoServico::create([
                'produto_id' => $produtoServico[$i][0],
                'servico_id' => $produtoServico[$i][1],
                'setor_id' => $produtoServico[$i][2],
                'quantEquipe' => $produtoServico[$i][3],
                'tempoMedioMin' => $produtoServico[$i][4]
            ]);
        }
    }
}
