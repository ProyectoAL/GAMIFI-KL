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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('mote')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('date')->nullable();
            $table->string('centro')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('img')->nullable();
            $table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
