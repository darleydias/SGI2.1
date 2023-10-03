<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Indicador;

class IndicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        static $indicador = array(
            array('Produção dia','> melhor','média da quantidade de servico realizada em um dia, do início da produção até a data atual','servicos','apontamento','sim'),
            array('OTIF','< melhor','valor médio das op passadas, da soma do tempo dos servicos restantes, dividindo-se por 8 horas','dias','apontamento','sim'),
            array('Tempo de inatividade','< melhor','soma dos tempos parados, analisados percentualmente com o total de tempo até hoje','percentual','apontamento','nao'),
            array('Conformidade','< melhor','Numero percentual de peças identificadas inconforme, em relação ao total','percentual','apontamento','nao')
        );
        
        for($i=0;$i<count($indicador);$i++){
            Indicador::create([
                'nome' => $indicador[$i][0],
                'polaridade' => $indicador[$i][1],
                'formula' => $indicador[$i][2] ,
                'unidade' => $indicador[$i][3],
                'fonte' => $indicador[$i][4],
                'finalistico' => $indicador[$i][5]            
            ]);
        }
    }
}
