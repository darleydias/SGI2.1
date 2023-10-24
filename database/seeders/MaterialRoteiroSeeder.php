<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialRoteiroSeeder extends Seeder
{
    public function run(): void
    {
        static $material = array(
            array(2,2,10),
            array(1,1,38),
            array(3,2,455),
            array(4,4,23),
            array(5,7,123),
            array(6,7,435),
            array(7,10,34),
            array(8,9,567),
            array(9,8,777),
            array(10,7,800)
        );
        for($i=0;$i<count($material);$i++){
            Material::create([
                'roteiro_id' => $material[$i][0],
                'material_id' => $material[$i][1],
                'quant' => $material[$i][2]                
            ]);
        }
    }
}
