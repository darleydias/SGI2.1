<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SetorExecutante;

class SetorExecutanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $setorExecutante = array(
            array(1,1, "2023-08-01","2023-08-04",3000,3000),
            array(2,1, "2023-08-05","2023-08-07",3000,3000),
            array(3,1, "2023-08-09","2023-08-12",3000,3000),
            array(4,1, "2023-08-13","2023-08-14",3000,1000),
            array(5,1, "2023-08-15","2023-08-19",3000,3000),
            array(6,1, "2023-08-22","2023-08-25",3000,3000),
            array(1,2, "2023-08-01","2023-08-04",3000,3000),
            array(2,2, "2023-08-05","2023-08-07",3000,3000),
            array(3,2, "2023-08-09","2023-08-12",3000,3000),
            array(4,2, "2023-08-13","2023-08-14",3000,3000),
            array(5,2, "2023-08-15","2023-08-19",3000,3000),
            array(6,2, "2023-08-22","2023-08-25",3000,300),
            array(1,3, "2023-08-01","2023-08-04",3000,3000),
            array(2,3, "2023-08-05","2023-08-07",3000,3000),
            array(3,3, "2023-08-09","2023-08-12",3000,3000),
            array(4,3, "2023-08-13","2023-08-14",3000,1000),
            array(5,3, "2023-08-15","2023-08-19",3000,3000),
            array(6,3, "2023-08-22","2023-08-25",3000,3000),
            array(1,4, "2023-08-01","2023-08-04",3000,3000),
            array(2,4, "2023-08-05","2023-08-07",3000,3000),
            array(3,4, "2023-08-09","2023-08-12",3000,3000),
            array(4,4, "2023-08-13","2023-08-14",3000,3000),
            array(5,4, "2023-08-15","2023-08-19",3000,0),
            array(6,4, "2023-08-22","2023-08-25",3000,0),
        );
        for($i=0;$i<24;$i++){
            SetorExecutante::create([
                'id_setor' => $setorExecutante[$i][0],
                'id_producao' => $setorExecutante[$i][1],
                'dtInicio' => $setorExecutante[$i][2],
                'dtFim' => $setorExecutante[$i][3],
                'quantIni' => $setorExecutante[$i][4],
                'quantAtual' => $setorExecutante[$i][5]
            ]);
        }
    }
}
