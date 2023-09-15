<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('nota_fiscal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPedidoCompra')->nullable();;

            $table->text('nf_nomeOriginal')->nullable();;
            $table->text('nf_hash')->nullable();;
            $table->integer('nf_tamanho')->nullable();;
            $table->text('nf_contentType')->nullable();
            $table->text('nf_path')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_fiscal');
    }
};
