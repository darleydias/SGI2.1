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
        Schema::create('omie_motivo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cDescricao')->nullable();
            $table->string('cObservacao')->nullable();
            $table->string('nCodigo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('omie_motivo');
    }
};
