<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $servicos = array(
            array("fdf4","SADF","Produção Suporte",2,"Produção Suporte articulado","tUDO BEM",1),
            array("fdf4","SADF","Produção Base x",2,"Produção base","tUDO BEM",1),
            array("fdf4","SADF","Produção Carregador ",2,"Produção Carregador x","tUDO BEM",1),
            array("fdf4","SADF","Produção Suporte",2,"Produção Suporte articulado","tUDO BEM",1),
            array("fdf4","SADF","Produção Hub x",2,"Produção Suporte articulado","tUDO BEM",1),
            array("fdf4","SADF","Produção Suporte",2,"Produção Suporte articulado","tUDO BEM",1)
        );
        for($i=0;$i<6;$i++){
            Servico::create([
                'cod_operacao' => $servicos[$i][0],
                'cod_servico' => $servicos[$i][1],
                'desc' => $servicos[$i][2],
                'predecessor' => $servicos[$i][3],
                'especificacoes' => $servicos[$i][4],
                'obs' => $servicos[$i][5],
                'tipoServico_id' => $servicos[$i][6],
            ]);
        }
    }
}
