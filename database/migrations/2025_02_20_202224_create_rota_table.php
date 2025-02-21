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
        Schema::create('rota', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('placa');
            $table->foreign('placa')->references('placa')->on('veiculo');
            $table->string('motorista');
            $table->foreign('motorista')->references('cnh')->on('motorista');
            $table->string('origem');
            $table->string('destino');
            $table->integer('distancia');
            $table->integer('pesoCarga');
            $table->decimal('receita');
            $table->decimal('combustivel');
            $table->decimal('pedagio');
            $table->decimal('outros');
            $table->boolean('noPrazo');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rota');
    }
};
