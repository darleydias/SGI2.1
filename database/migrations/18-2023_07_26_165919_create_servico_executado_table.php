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
        Schema::create('servicoExecutado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produto')->unsigned();
            $table->integer('id_setorExecutante')->unsigned();
            $table->integer('id_responsavel')->unsigned();
            $table->integer('id_tipoServico')->unsigned();
            $table->timestamp('dtInicio')->nullable();
            $table->timestamp('dtFim')->nullable();
            $table->integer('quantIni')->nullable();
            $table->integer('quantConcluido')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_produto')->references('id')->on('produto');
            $table->foreign('id_setorExecutante')->references('id')->on('setor_executante');
            $table->foreign('id_responsavel')->references('id')->on('pessoa');
            $table->foreign('id_tipoServico')->references('id')->on('tipo_servico');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicoExecutado');
    }
};
