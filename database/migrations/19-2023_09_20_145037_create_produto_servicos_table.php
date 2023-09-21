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
        Schema::create('produto_servico', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('produto_id')->unsigned();
           $table->integer('servico_id')->unsigned();
           $table->integer('setor_id')->unsigned();
           $table->integer('quant')->nullable();

           $table->foreign('servico_id')->references('id')->on('servico');
           $table->foreign('produto_id')->references('id')->on('produto');

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_servico');
    }
};