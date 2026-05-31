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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portafolio_servicio_id');
            $table->foreign('portafolio_servicio_id')->references('id')->on('portafolio_servicios');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->date('fecha');
            $table->time('hora')->nullable();
            $table->boolean('turno_extra')->index()->default(false);
            $table->text('comentario')->nullable();
            $table->enum('estado',['agendada','preparacion','en atencion','atendida','incumplida','cancelada','pendiente'])->default('agendada');
            $table->unsignedBigInteger('cita_tipo_id');
            $table->foreign('cita_tipo_id')->references('id')->on('cita_tipos');
            $table->unsignedBigInteger('cita_subtipo_id');
            $table->foreign('cita_subtipo_id')->references('id')->on('cita_subtipos');
            $table->enum('atencion_tipo',['primera','subsecuente'])->nullable();
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
        Schema::dropIfExists('citas');
    }
};
