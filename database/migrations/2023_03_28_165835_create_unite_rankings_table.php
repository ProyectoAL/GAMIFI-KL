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
        Schema::create('unite_rankings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ranking')->references('id')->on('create_rankings');
            $table->string('codigo');
            $table->integer('Responsabilidad')->nullable();
            $table->integer('Cooperación')->nullable();
            $table->integer('Autonomía_e_iniciativa')->nullable();
            $table->integer('Gestión_emocional')->nullable();
            $table->integer('abilidades_de_pensamiento')->nullable();
            $table->string('puntos_semanales');
            $table->foreignId('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unite_rankings');
    }
};
