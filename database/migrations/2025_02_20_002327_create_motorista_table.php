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
        Schema::create('motorista', function (Blueprint $table) {
            $table->string("cnh");
            $table->primary("cnh");
            $table->string("nome");
            $table->date("vencimento");
            $table->string("celular");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorista');
    }
};
