<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $produtos = array(
            array("Case M4","Case M4", "C10dd",1,230),
            array("Suporte articulado","Suporte articulado", "S10dd",2,730),
            array("Base x","Base x", "10dd",2,230),
            array("Carregador x","Carregador x", "CR10dd",3,120),
            array("Hub x","Hub x", "H10dd",1,67),
            array("Multicharger","Multicharger", "M10dd",1,45)
        );
        for($i=0;$i<4;$i++){
            Produto::factory()->create([
                'nome' => $produtos[$i][0],
                'desc' => $produtos[$i][1],
                'cod' => $produtos[$i][2],
                'tipoProduto_id' => $produtos[$i][3],
                'peso' => $produtos[$i][4]
            ]);
        }
    }
}
