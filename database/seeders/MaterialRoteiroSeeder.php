<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaterialRoteiro;

class MaterialRoteiroSeeder extends Seeder
{
    public function run(): void
    {
        static $material = array(
            array(2,2,10),
            array(1,1,38),
            array(3,2,455),
            array(4,3,23),
            array(5,2,123),
            array(2,3,435),
            array(2,2,34),
            array(1,3,567),
            array(3,3,777),
            array(3,1,800)
        );
        for($i=0;$i<count($material);$i++){
            MaterialRoteiro::create([
                'roteiro_id' => $material[$i][0],
                'material_id' => $material[$i][1],
                'quant' => $material[$i][2]                
            ]);
        }
    }
}
