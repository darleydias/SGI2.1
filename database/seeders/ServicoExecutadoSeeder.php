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
            
            array(1,1,1,1,"2023-09-01 10:00:00","2023-09-01 10:00:00",4000,239),
            array(1,2,1,1,"2023-09-01 10:00:00","2023-09-12 10:00:00",4000,239),
            array(1,3,1,1,"2023-09-01 10:00:00","2023-09-13 10:00:00",4000,239),
            array(1,4,1,1,"2023-09-01 10:00:00","2023-09-15 10:00:00",4000,239),
            array(1,1,1,1,"2023-09-01 10:00:00","2023-09-17 10:00:00",4000,239),
            array(1,1,1,1,"2023-09-01 10:00:00","2023-09-23 10:00:00",4000,239),
            array(1,1,1,1,"2023-09-01 10:00:00","2023-09-26 10:00:00",4000,239)
        );
        for($i=0;$i<count($servicoExecutado);$i++){
            ServicoExecutado::create([
                'id_produto' => $servicoExecutado[$i][0],
                'id_setorExecutante' => $servicoExecutado[$i][1],
                'id_responsavel' => $servicoExecutado[$i][2],
                'id_tipoServico' => $servicoExecutado[$i][3],
                'dtInicio' => $servicoExecutado[$i][4],
                'dtFim' => $servicoExecutado[$i][5],
                'quantIni' => $servicoExecutado[$i][6],
                'quantConcluido' => $servicoExecutado[$i][7]

            ]);
        }
    }
}
