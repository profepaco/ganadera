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
        Schema::create('productores', function (Blueprint $table) {
            $table->id();
            $table->string('INE')->unique();
            $table->string('RFC')->unique();
            $table->string('CURP')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('domicilio');
            $table->string('telefono');
            $table->boolean('esSocio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productores');
    }
};
