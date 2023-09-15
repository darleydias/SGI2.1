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
        Schema::create('roteiro', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nome')->nullable();
         $table->integer('produto_id')->unsigned();
         
         $table->foreign('produto_id')->references('id')->on('produto');

         $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roteiro');
    }
};
