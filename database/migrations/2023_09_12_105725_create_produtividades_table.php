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
        Schema::create('produtividade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setorExecutante_id')->unsigned();
            $table->integer('producao_id')->unsigned();
            $table->integer('pessoa_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtividade');
    }
};
