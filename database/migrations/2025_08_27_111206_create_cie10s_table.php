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
        Schema::create('cie10s', function (Blueprint $table) {
            $table->id(); // id autoincremental
            $table->string('clave', 10)->index(); // código CIE10 (ej: A00, A001...)
            $table->string('nombre');             // descripción
            $table->boolean('estado')->default(true); // activo/inactivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cie10s');
    }
};
