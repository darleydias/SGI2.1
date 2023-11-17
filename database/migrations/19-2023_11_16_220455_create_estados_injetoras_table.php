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
        Schema::create('estados_injetoras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado')->nullable()->default(0);
            $table->integer('id_maquina')->unsigned()->nullable();
            $table->timestamp('unixtime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados_injetoras');
    }
};
