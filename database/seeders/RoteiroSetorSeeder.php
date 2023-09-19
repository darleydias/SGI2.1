<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoteiroSetor;

class RoteiroSetorSeeder extends Seeder
{
    public function run(): void
    {
        static $roteiroSetor = array(
            array(1,1),
            array(1,2),
            array(1,3),
            array(1,4),
            array(1,5),
            array(1,6),
            array(2,1),
            array(2,2),
            array(2,3),
            array(2,4),
            array(2,5)
        );
        for($i=0;$i<count($roteiroSetor);$i++){
            RoteiroSetor::create([
                'roteiro_id' => $roteiroSetor[$i][0],
                'setor_id' => $roteiroSetor[$i][1]            
            ]);
        }
    }
}
