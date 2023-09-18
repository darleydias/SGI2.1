<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producao;


class ProducaoSeeder extends Seeder
{
    public function run(): void

    {
        static $producao = array(
            array(1,2000,"2234/2023","2023-08-01","2023-08-12","2023-08-13","Fazer bem feito",1),
            array(2,2500, "2234/2023","2023-08-01","2023-08-12","2023-08-10","Fazer bem feito",2),
            array(3,3200, "2234/2023","2023-08-01","2023-08-14","2023-08-09","Fazer bem feito",3),
            array(2,2000, "2234/2023","2023-08-01","2023-08-04","2023-08-07","Fazer bem feito",4),
            array(1,12000, "2234/2023","2023-08-01","2023-08-15","2023-08-12","Fazer bem feito",2),
            array(1,1000, "2234/2023","2023-08-01","2023-08-17","2023-08-17","Fazer bem feito",1),
        );
        
        for($i=0;$i<count($producao);$i++){
            Producao::create([
                'produto_id' => $producao[$i][0],
                'qt' => $producao[$i][1],
                'opNum' => $producao[$i][2],
                'dataInicio' => $producao[$i][3],
                'dataPrevista' => $producao[$i][4],
                'dataEntrega' => $producao[$i][5],
                'obs' => $producao[$i][6],
                'cliente_id' => $producao[$i][7]
            ]);
        }
    }
}
