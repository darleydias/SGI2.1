<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producao;


class ProducaoSeeder extends Seeder
{
    public function run(): void{
        static $producao = array(
            array(2,1,2000,"45234524","2023-09-10","2023-09-10","2023-09-10","teste"),
            array(2,1,2000,"45234524","2023-09-10","2023-09-10","2023-09-10","teste"),
            array(3,1,2000,"45234524","2023-09-10","2023-09-10","2023-09-10","teste"),
            array(4,1,2000,"45234524","2023-09-10","2023-09-10","2023-09-10","teste")
        );
        for($i=0;$i<count($producao);$i++){
            Producao::create([
                'produto_id' => $producao[$i][0],
                'cliente_id' => $producao[$i][1],
                'qt' => $producao[$i][2],
                'opNum' => $producao[$i][3],
                'dataInicio' => $producao[$i][4],
                'dataEntrega' => $producao[$i][5],
                'dataPrevista' => $producao[$i][6],
                'obs' => $producao[$i][7]
            ]);
        }
    }
}
