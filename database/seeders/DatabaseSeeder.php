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
        // \App\Models\Sistema::factory(10)->create();
        // \App\Models\Funcionalidade::factory(10)->create();
        // \App\Models\Grupo::factory(10)->create();
        // \App\Models\NotaFiscal::factory(10)->create();
    
        \App\Models\Pessoa::factory(10)->create(); 
        $this->call([TipoProdutoSeeder::class]);
        $this->call([SeguimentoSeeder::class]);
        \App\Models\Cliente::factory(10)->create();
        $this->call([ProdutoSeeder::class]);
        $this->call([ProducaoSeeder::class]);
        $this->call([TipoServicoSeeder::class]);
        $this->call([SetorSeeder::class]);
        $this->call([SetorExecutanteSeeder::class]);
        $this->call([ServicoSeeder::class]);
        $this->call([MaterialSeeder::class]);
        $this->call([RoteiroSeeder::class]);
        \App\Models\MaterialRoteiro::factory(10)->create();
        $this->call([ServicoSetorSeeder::class]);
        $this->call([RoteiroSetorSeeder::class]);
        $this->call([ServicoExecutadoSeeder::class]);
        $this->call([TrabalhoSeeder::class]);
        $this->call([MaterialGastoSeeder::class]);
        $this->call([ProdutoServicoSeeder::class]);
        $this->call([IndicadorSeeder::class]);
        $this->call([MetaSeeder::class]);
    }
}
