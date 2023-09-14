<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('setor_executante', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_setor')->unsigned();
            $table->integer('id_producao')->unsigned();
            $table->timestamp('dtInicio')->nullable();
            $table->timestamp('dtFim')->nullable();
            $table->integer('quantIni')->nullable();
            $table->integer('quantAtual')->nullable();
            $table->integer('faltam')->nullable();
            $table->timestamps();
            
            $table->foreign('id_producao')->references('id')->on('producao');
            $table->foreign('id_setor')->references('id')->on('setor_rol');

  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setor_executante');
    }
};
