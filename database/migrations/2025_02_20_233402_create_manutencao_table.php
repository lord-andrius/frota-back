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
        Schema::create('manutencao', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('placa');
            $table->foreign('placa')->references('placa')->on('veiculo');
            $table->boolean('iluminacao');
            $table->boolean('eletrica');
            $table->boolean('motor');
            $table->boolean('embreagem');
            $table->boolean('freios');
            $table->boolean('lataria');
            $table->boolean('vidros');
            $table->boolean('pneus');
            $table->decimal('orcamento');
            $table->integer('motivoDefeito');
            $table->foreign('motivoDefeito')->references('id')->on('motivodefeito');
            $table->string('observacao');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manutencao');
    }
};
