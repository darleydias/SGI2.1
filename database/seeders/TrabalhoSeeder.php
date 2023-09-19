<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trabalho;

class TrabalhoSeeder extends Seeder
{
    public function run(): void
    {
        static $trabalho = array(
            array(1,2,"2023-09-01","2023-09-01",1),
            array(1,2,"2023-09-01","2023-09-01",1),
            array(1,2,"2023-09-01","2023-09-01",1),
            array(1,2,"2023-09-01","2023-09-01",1),
            array(1,2,"2023-09-01","2023-09-01",1),
            array(1,2,"2023-09-01","2023-09-01",1)
        );
        for($i=0;$i<count($trabalho);$i++){
            Trabalho::create([
                'id_executor' => $trabalho[$i][0],
                'id_servicoExecutado' => $trabalho[$i][1],
                'tempoInicio' => $trabalho[$i][2],
                'tempoFim' => $trabalho[$i][3],
                'trabalhoPausa' => $trabalho[$i][4]
            ]);
        }
    }
}
