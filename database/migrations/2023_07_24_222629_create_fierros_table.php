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
        Schema::create('fierros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patente_id');
            $table->string('imagen');
            $table->foreign('patente_id')->references('id')->on('patentes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fierros');
    }
};
