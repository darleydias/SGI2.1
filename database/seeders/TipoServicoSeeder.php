<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoServico;

class TipoServicoSeeder extends Seeder
{
    public function run(): void
    {
        static $tipoServico = array(
            array("Montagem"),
            array("Manutenção"),
            array("Instalação")
        );
        for($i=0;$i < count($tipoServico);$i++){
            TipoServico::create([
                'nome' => $tipoServico[$i][0]
            ]);
        }
    }
}
