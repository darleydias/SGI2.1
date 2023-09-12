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
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('CNPJ',100);
            $table->string('cel',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('contato',100)->nullable();
            $table->string('insEst',100)->nullable();
            $table->string('insMun',100)->nullable();
            $table->integer('seguimento_id')->unsigned();
            $table->integer('cliente_status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('seguimento_id')->references('id')->on('seguimento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
