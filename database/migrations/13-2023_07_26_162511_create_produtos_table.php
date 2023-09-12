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
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->text('desc');
            $table->string('cod',100);
            $table->integer('tipoProduto_id')->unsigned();
            $table->double('peso')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tipoProduto_id')->references('id')->on('tipo_produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
