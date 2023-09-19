<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seguimento;

class SeguimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $seguimento = array(
            array("Comercio"),
            array("Industria"),
            array("Agro")
        );
        for($i=0;$i<count($seguimento);$i++){
            Seguimento::create([
                'nome' => $seguimento[$i][0]
            ]);
        }
    }
}
