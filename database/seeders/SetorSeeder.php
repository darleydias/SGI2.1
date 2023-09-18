<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setor;

class SetorSeeder extends Seeder
{
    public function run(): void

    {
        static $setores = array(
            array("Almoxarifado", 10),
            array("Elétrica", 20),
            array("Mecânica", 40),
            array("Identificação", 30),
            array("Finalização", 15),
            array("Expedição", 10)
        );
        for($i=0;$i<6;$i++){
            Setor::create([
                'nome' => $setores[$i][0],
                'peso' => $setores[$i][1],
            ]);
        }
    }
}
