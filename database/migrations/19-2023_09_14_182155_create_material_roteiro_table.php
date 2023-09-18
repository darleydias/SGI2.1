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
        Schema::create('material_roteiro', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('roteiro_id')->unsigned();
         $table->integer('material_id')->unsigned();

         $table->foreign('roteiro_id')->references('id')->on('roteiro');
         $table->foreign('material_id')->references('id')->on('material');

         $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_roteiro');
    }
};
