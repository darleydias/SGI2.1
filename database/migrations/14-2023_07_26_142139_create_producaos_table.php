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
        Schema::create('producao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produto_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('qt');
            $table->string('opNum');
            $table->timestamp('dataInicio')->nullable();
            $table->timestamp('dataPrevista')->nullable();
            $table->timestamp('dataEntrega')->nullable();
            $table->text('obs')->nullable();
            
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produto');
            $table->foreign('cliente_id')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producao');
    }
};
