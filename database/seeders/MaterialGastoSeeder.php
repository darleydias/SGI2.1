<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaterialGasto;

class MaterialGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $materialGasto = array(
            array(1,1,200),
            array(2,1,20),
            array(3,1,430),
            array(4,2,220),
            array(5,2,250),
            array(1,3,100),
            array(2,3,120),
            array(3,1,210),
            array(4,2,10),
            array(5,2,110),
            array(6,2,440)
        );
        for($i=0;$i<count($materialGasto);$i++){
            MaterialGasto::create([
                'material_id' => $materialGasto[$i][0],
                'setorExecutante_id' => $materialGasto[$i][1],
                'quant' => $materialGasto[$i][2]              
            ]);
        }
    }
}
