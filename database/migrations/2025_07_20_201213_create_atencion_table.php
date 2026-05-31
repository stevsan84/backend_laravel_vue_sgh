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
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes'); 
            $table->unsignedBigInteger('cita_id')->nullable();
            $table->foreign('cita_id')->references('id')->on('citas');
            $table->unsignedBigInteger('area_salud_id');
            $table->foreign('area_salud_id')->references('id')->on('area_saluds');
            $table->datetime('fecha_ingreso')->nullable();
            $table->datetime('fecha_egreso')->nullable();
            $table->enum('estado',['preparacion','en atencion','alta'])->default('preparacion');
            $table->unsignedBigInteger('area_salud_actual_id')->nullable();
            $table->foreign('area_salud_actual_id')->references('id')->on('area_saluds');
           
            //$table->unsignedBigInteger('cita_tipo_id')->nullable();
            //$table->foreign('cita_tipo_id')->references('id')->on('cita_tipos');
            //$table->unsignedBigInteger('cita_subtipo_id')->nullable();
            //$table->foreign('cita_subtipo_id')->references('id')->on('cita_subtipos');
            //$table->unsignedBigInteger('manchester_triage_id')->nullable();
            //$table->foreign('manchester_triage_id')->references('id')->on('manchester_triages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencions');
    }
};
