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
        Schema::create('preparacions', function (Blueprint $table) {
            $table->id();
            $table->dateTime("fecha");
            $table->unsignedBigInteger('atencion_id');
            $table->foreign('atencion_id')->references('id')->on('atencions');
            $table->unsignedBigInteger('atencion_formulario_id')->nullable();
            $table->foreign('atencion_formulario_id')->references('id')->on('atencion_formularios');
            $table->unsignedBigInteger('area_salud_id');
            $table->foreign('area_salud_id')->references('id')->on('area_saluds');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            
            $table->enum('estado', ['preparacion', 'en atencion','atendido', 'cancelado', 'incumplido'])->default('preparacion');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparacions');
    }
};
