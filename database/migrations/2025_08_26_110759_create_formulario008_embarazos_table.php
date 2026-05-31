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
        Schema::create('formulario008_embarazos', function (Blueprint $table) {
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

            $table->boolean('no_aplica')->default(false);

            $table->string('numero_gestas')->nullable();
            $table->string('numero_partos')->nullable();
            $table->string('numero_abortos')->nullable();
            $table->string('numero_cesareas')->nullable();

            $table->string('fum')->nullable();
            $table->string('semanas_gestacion')->nullable();
            $table->string('movimiento_fetal')->nullable();
            $table->string('frecuencia_cardiaca_fetal')->nullable();
            $table->string('ruptura_membranas')->nullable();
            $table->string('tiempo')->nullable();
            $table->string('afu')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('dilatacion')->nullable();
            $table->string('borramiento')->nullable();
            $table->string('plano')->nullable();
            $table->string('pelvis_viable')->nullable();
            $table->string('sangrado_vaginal')->nullable();
            $table->string('contracciones')->nullable();
            $table->string('score_mama')->nullable();


            $table->text('observacion');
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
        Schema::dropIfExists('formulario008_embarazos');
    }
};
