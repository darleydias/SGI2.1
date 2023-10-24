<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        static $material = array(
            array("C45","Cabo TP","un"),
            array("T66","Tomada RS232","un"),
            array("S67","Solda Estanho","mts"),
            array("C99","Conector P2","cx"),
            array("C22","Cabo TP","un"),
            array("T34","Tomada RS232","un"),
            array("S5","Solda Estanho","mts"),
            array("C777","Conector P2","cx"),
            array("C88","Cabo TP","un"),
            array("T9","Tomada RS232","un"),
            array("S34","Solda Estanho","mts")
        );
        for($i=0;$i<count($material);$i++){
            Material::create([
                'cod' => $material[$i][0],
                'desc' => $material[$i][1],
                'unid' => $material[$i][2]                
            ]);
        }
    }
}
