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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion_code')->unique();
            $table->string('nombre_primero');
            $table->string('nombre_segundo')->nullable();
            $table->string('apellido_primero');
            $table->string('apellido_segundo')->nullable();
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')->references('id')->on('cantons');
            $table->unsignedBigInteger('parroquia_id');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->string('direccion');
            $table->enum('sexo',['hombre','mujer']);
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('email')->nullable();
            $table->string('registro_profesional')->nullable();
            $table->unsignedBigInteger('identificacion_tipo_id');
            $table->foreign('identificacion_tipo_id')->references('id')->on('identificacion_tipos');
            $table->unsignedBigInteger('portafolio_servicio_id')->nullable();
            $table->foreign('portafolio_servicio_id')->references('id')->on('portafolio_servicios');
            $table->unsignedBigInteger('etnico_grupo_id');
            $table->foreign('etnico_grupo_id')->references('id')->on('etnico_grupos');
            $table->unsignedBigInteger('formacion_profesional_id');
            $table->foreign('formacion_profesional_id')->references('id')->on('formacion_profesionals');
            $table->unsignedBigInteger('especialidad_id')->nullable();
            $table->foreign('especialidad_id')->references('id')->on('especialidads');
            $table->unsignedBigInteger('area_trabajo_id');
            $table->foreign('area_trabajo_id')->references('id')->on('area_trabajos');
            $table->enum('tratante',['si','no'])->nullable();
            $table->text('observacion')->nullable();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('link_user_id')->nullable();
            $table->foreign('link_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('personas');
    }
};
