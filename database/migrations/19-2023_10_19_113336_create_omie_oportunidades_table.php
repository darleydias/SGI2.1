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
        Schema::create('omie_oportunidade', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dConclusao')->nullable();
            $table->timestamp('dNovoLead')->nullable();
            $table->bigInteger('nCodFase')->nullable();
            $table->bigInteger('nCodMotivo')->nullable();
            $table->bigInteger('nCodStatus')->nullable();
            $table->string('nCodVendedor')->nullable();
            $table->double('nTicket')->nullable();
            $table->string('cDesOp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('omie_oportunidade');
    }
};
