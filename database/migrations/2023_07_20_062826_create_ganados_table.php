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
        Schema::create('ganados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productor_id');
            $table->unsignedBigInteger('especie_id');
            $table->integer('cantidad');
            $table->foreign('productor_id')->references('id')->on('productores');
            $table->foreign('especie_id')->references('id')->on('especies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganados');
    }
};
