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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->string('mote');
            $table->string('nombre');
            $table->string('lastname');
            $table->longText('entrega');
            $table->string('nota');
            $table->foreignId('id_practicas')->references('id')->on('practicas');
            $table->foreignId('id_ranking')->references('id')->on('create_rankings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
