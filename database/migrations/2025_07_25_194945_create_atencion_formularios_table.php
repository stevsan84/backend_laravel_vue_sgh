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
        Schema::create('atencion_formularios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atencion_id')->constrained('atencions');
            $table->foreignId('formulario_id')->constrained('formularios');
            $table->foreignId('area_salud_id')->constrained('area_saluds');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->enum('estado', ['activo', 'cerrado'])->default('activo');
            $table->foreignId('user_id')->constrained('users'); // quien abrió el formulario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencion_formularios');
    }
};
