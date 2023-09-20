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
        Schema::create('material_gasto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->integer('setorExecutante_id')->unsigned();
            $table->integer('quant')->nullable();

            $table->foreign('material_id')->references('id')->on('material');
            $table->foreign('setorExecutante_id')->references('id')->on('setor_executante');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_gasto');
    }
};
