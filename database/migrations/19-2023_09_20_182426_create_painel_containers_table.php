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
        Schema::create('painel_containers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('op_id')->unsigned();
          $table->integer('setor_id')->unsigned();
          $table->integer('qt_prev')->nullable();
          $table->integer('qt_real')->nullable();
          $table->integer('percent')->nullable();
          

          $table->foreign('op_id')->references('id')->on('producao');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('painel_containers');
    }
};
