<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        \App\Models\Sistema::factory(10)->create();
        \App\Models\Funcionalidade::factory(10)->create();
        \App\Models\Grupo::factory(10)->create();
        \App\Models\NotaFiscal::factory(10)->create();
        \App\Models\Omie::factory(10)->create();
        \App\Models\Pessoa::factory(10)->create(); 
        \App\Models\TipoProduto::factory(10)->create();
        \App\Models\Seguimento::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
        $this->call([ProdutoSeeder::class]);
        \App\Models\Producao::factory(10)->create();
        \App\Models\TipoServico::factory(10)->create();
        $this->call([SetorSeeder::class]);
        $this->call([SetorExecutanteSeeder::class]);
        // \App\Models\SetorExecutante::factory(10)->create();
        \App\Models\Servico::factory(10)->create();
        \App\Models\Trabalho::factory(10)->create();

    }
}
