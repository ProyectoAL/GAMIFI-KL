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
        Schema::create('soft__skills', function (Blueprint $table) {
            $table->id();
            $table->integer('nivel');
            $table->integer('puntosr');
            $table->string("rango");
            $table->longText("medalla");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soft__skills');
    }
};
