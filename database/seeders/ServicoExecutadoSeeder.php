<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicoExecutado;

class ServicoExecutadoSeeder extends Seeder
{

    public function run(): void
    {
        static $servicoExecutado = array(
            
            array(1,1,1,"2023-09-01 10:00:00","2023-09-01 10:00:00",4000,239),
            array(2,1,2,"2023-09-01 10:00:00","2023-09-12 10:00:00",4000,456),
            array(3,1,3,"2023-09-01 10:00:00","2023-09-13 10:00:00",4000,121),
            array(4,1,4,"2023-09-01 10:00:00","2023-09-15 10:00:00",4000,789),
            array(1,1,2,"2023-09-01 10:00:00","2023-09-17 10:00:00",4000,444),
            array(5,1,5,"2023-09-01 10:00:00","2023-09-23 10:00:00",4000,222),
            array(6,1,6,"2023-09-01 10:00:00","2023-09-26 10:00:00",4000,890),
            array(5,1,5,"2023-09-01 10:00:00","2023-09-23 10:00:00",4000,782),
            array(6,1,6,"2023-09-01 10:00:00","2023-09-26 10:00:00",4000,678)
        );
        for($i=0;$i<count($servicoExecutado);$i++){
            ServicoExecutado::create([

                'id_setorExecutante' => $servicoExecutado[$i][0],
                'id_responsavel' => $servicoExecutado[$i][1],
                'id_servico' => $servicoExecutado[$i][2],
                'dtInicio' => $servicoExecutado[$i][3],
                'dtFim' => $servicoExecutado[$i][4],
                'quantIni' => $servicoExecutado[$i][5],
                'quantConcluido' => $servicoExecutado[$i][6]

            ]);
        }
    }
}
