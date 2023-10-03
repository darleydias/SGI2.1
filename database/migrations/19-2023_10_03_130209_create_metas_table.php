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
        Schema::create('meta', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('indicador_id')->unsigned();
        $table->double('valor')->nullable();
        $table->string('periodicidade')->nullable();
        $table->integer('setor_id')->unsigned();
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('indicador_id')->references('id')->on('indicador');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta');
    }
};
