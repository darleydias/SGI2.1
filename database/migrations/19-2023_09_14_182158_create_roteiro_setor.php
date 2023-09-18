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
        Schema::create('roteiro_setor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roteiro_id')->unsigned();
            $table->integer('setor_id')->unsigned();
            $table->foreign('roteiro_id')->references('id')->on('roteiro');
            $table->foreign('setor_id')->references('id')->on('setor');


            $table->softDeletes();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roteiro_setor');
    }
};
