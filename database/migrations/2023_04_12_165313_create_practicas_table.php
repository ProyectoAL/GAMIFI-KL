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
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesor')->references('id')->on('users')->nullable();
            $table->foreignId('id_ranking')->references('id')->on('create_rankings');
            $table->string('codigo');
            $table->string('nombre')->nullable();
            $table->longText('descripcion');
            $table->string('puntuacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicas');
    }
};
