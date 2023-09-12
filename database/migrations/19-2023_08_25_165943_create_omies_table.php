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
        Schema::create('omie', function (Blueprint $table) {
            $table->increments('id');

            $table->text('codigo')->nullable();;
            $table->text('descricao')->nullable();;
            $table->text('valor_unitario')->nullable();;


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('omie');
    }
};
