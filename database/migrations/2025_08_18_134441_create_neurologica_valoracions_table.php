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
        Schema::create('neurologica_valoracions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atencion_id');
            $table->foreign('atencion_id')->references('id')->on('atencions');
            $table->unsignedBigInteger('atencion_formulario_id');
            $table->foreign('atencion_formulario_id')->references('id')->on('atencion_formularios');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('area_salud_id');
            $table->foreign('area_salud_id')->references('id')->on('area_saluds');
            $table->datetime('fecha');
            $table->decimal('glasgow_ocular')->nullable();
            $table->decimal('glasgow_verbal')->nullable();
            $table->decimal('glasgow_motora')->nullable();
            $table->decimal('reaccion_pupilar_derecha')->nullable();
            $table->decimal('reaccion_pupilar_izquierda')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neurologica_valoracions');
    }
};
