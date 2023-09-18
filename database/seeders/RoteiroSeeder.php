<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roteiro;
class RoteiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $roteiro = array(
            array("Produção Case M4",1),
            array("Produção Suporte articulado",2),
            array("Produção Base x",2),
            array("Produção Carregador x",4),
            array("Produção Hub x",3)

        );
        for($i=0;$i<count($roteiro);$i++){
            Roteiro::create([
                'nome' => $roteiro[$i][0],
                'produto_id' => $roteiro[$i][1]
            ]);
        }
    }
}
