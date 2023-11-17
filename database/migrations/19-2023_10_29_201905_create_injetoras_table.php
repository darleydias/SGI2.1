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
        Schema::create('injetora', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_maquina')->nullable();
          $table->integer('corrente')->nullable();
          $table->integer('estado')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('injetora');
    }
};
