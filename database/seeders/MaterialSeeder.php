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
            array("C45","Cabo TP",200,"un"),
            array("T66","Tomada RS232",400,"un"),
            array("S67","Solda Estanho",50,"mts"),
            array("C99","Conector P2",400,"cx"),
            array("C22","Cabo TP",200,"un"),
            array("T34","Tomada RS232",400,"un"),
            array("S5","Solda Estanho",50,"mts"),
            array("C777","Conector P2",400,"cx"),
            array("C88","Cabo TP",200,"un"),
            array("T9","Tomada RS232",400,"un"),
            array("S34","Solda Estanho",50,"mts")
        );
        for($i=0;$i<count($material);$i++){
            Material::create([
                'cod' => $material[$i][0],
                'desc' => $material[$i][1],
                'quant' => $material[$i][2],
                'unid' => $material[$i][3]                
            ]);
        }
    }
}
