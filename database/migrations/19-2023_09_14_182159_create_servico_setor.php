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
        Schema::create('servico_setor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servico_id')->unsigned();
            $table->integer('setor_id')->unsigned();

            $table->foreign('servico_id')->references('id')->on('servico');
            $table->foreign('setor_id')->references('id')->on('setor');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico_setor');
    }
};
