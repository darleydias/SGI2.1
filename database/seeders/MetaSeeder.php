<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meta;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $meta = array(
            array(1,20,'mensal',0),
            array(1,20,'mensal',1),
            array(1,20,'mensal',2),
            array(1,20,'mensal',3),
            array(1,20,'mensal',4),
            array(1,20,'mensal',5),
            array(1,20,'mensal',6),
            array(2,20,'mensal',0),
            array(3,10,'mensal',0),
            array(4,1,'mensal',0)
            
        );

        for($i=0;$i<count($meta);$i++){
            Meta::create([
                'indicador_id' => $meta[$i][0],
                'valor' => $meta[$i][1],
                'periodicidade' => $meta[$i][2],
                'setor_id' => $meta[$i][3]          
            ]);
        }
    }
}
