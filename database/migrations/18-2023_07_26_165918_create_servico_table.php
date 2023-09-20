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
        Schema::create('servico', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('tipoServico_id')->unsigned();
           $table->string('cod_operacao')->nullable();
           $table->string('cod_servico')->nullable();
           $table->string('desc')->nullable();
           $table->integer('predecessor')->nullable();
           $table->string('especificacoes')->nullable();
           $table->string('obs')->nullable();

           $table->foreign('tipoServico_id')->references('id')->on('tipo_servico');

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico');
    }
};
