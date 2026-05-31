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
        Schema::create('signos_vitales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atencion_id');
            $table->foreign('atencion_id')->references('id')->on('atencions');
            $table->unsignedBigInteger('atencion_formulario_id')->nullable();
            $table->foreign('atencion_formulario_id')->references('id')->on('atencion_formularios');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('preparacion_id')->nullable();
            $table->foreign('preparacion_id')->references('id')->on('preparacions');
            $table->unsignedBigInteger('area_salud_id');
            $table->foreign('area_salud_id')->references('id')->on('area_saluds');
            $table->datetime('fecha');

            $table->boolean('sin_signos_vitales')->index()->default(false);
            $table->decimal('presion_arterial_sistolica');
            $table->decimal('presion_arterial_diastolica');
            $table->decimal('presion_arterial_media')->nullable();
            $table->decimal('temperatura');
            $table->decimal('frecuencia_respiratoria');
            $table->decimal('frecuencia_cardiaca');
            $table->decimal('saturacion_oxigeno');

            /*$table->decimal('peso');
            $table->decimal('talla_estatura');
            $table->enum('tallaje',['de_pie','acostado'])->default('de_pie');
            $table->decimal('imc');
            $table->decimal('perimetro_abdominal')->nullable();
            $table->decimal('perimetro_cefalico')->nullable();*/

            /*$table->decimal('glucosa capilar')->nullable();
            $table->decimal('hemoglobina')->nullable();*/

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
        Schema::dropIfExists('signos_vitales');
    }
};
