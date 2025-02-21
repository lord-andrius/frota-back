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
        Schema::create('veiculo', function (Blueprint $table) {
            $table->string('placa');
            $table->primary('placa');
            $table->integer('tipo');
            $table->foreign('tipo')->references('id')->on('tipoveiculo');
            $table->integer('anoDeFabricacao');
            $table->string('cor');
            $table->integer('rodagemAquisicao');
            $table->integer('cargaMaxima');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculo');
    }
};
