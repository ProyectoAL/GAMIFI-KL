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
            $table->integer('Responsabilidad')->default(0);
            $table->integer('Cooperacion')->default(0);
            $table->integer('Autonomia_e_iniciativa')->default(0);
            $table->integer('Gestion_emocional')->default(0);
            $table->integer('abilidades_de_pensamiento')->default(0);
            $table->integer('puntos_semanales')->default(0);
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->string('mote_usuario');
            $table->timestamps();
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
