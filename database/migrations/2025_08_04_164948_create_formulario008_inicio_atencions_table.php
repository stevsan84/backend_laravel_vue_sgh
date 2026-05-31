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
        Schema::create('formulario008_inicio_atencions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atencion_id');
            $table->foreign('atencion_id')->references('id')->on('atencions');
            $table->unsignedBigInteger('atencion_formulario_id');
            $table->foreign('atencion_formulario_id')->references('id')->on('atencion_formularios');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            //$table->unsignedBigInteger('preparacion_id')->nullable();
            //$table->foreign('preparacion_id')->references('id')->on('preparacions');
            $table->unsignedBigInteger('area_salud_id');
            $table->foreign('area_salud_id')->references('id')->on('area_saluds');
            //$table->datetime('fecha');

            $table->datetime('fecha_inicio');
            $table->enum('condicion_llegada',['estable','inestable','fallecido']);
            $table->text('motivo_atencion');
            
            //$table->datetime('fecha_fin')->nullable();
            //$table->text('obervacion_egreso')->nullable();
            //$table->enum('estado',['activo', 'cerrado'])->default('activo');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('estado')->index()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario008_inicio_atencions');
    }
};
