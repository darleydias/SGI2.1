<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicoSetor;

class ServicoSetorSeeder extends Seeder
{
    public function run(): void
    {
        static $servicoSetor = array(
            array(1,1),
            array(1,2),
            array(2,1),
            array(2,2)
        );
        for($i=0;$i<count($servicoSetor);$i++){
            ServicoSetor::create([
                'servico_id' => $servicoSetor[$i][0],
                'setor_id' => $servicoSetor[$i][1]            
            ]);
        }
    }
}
