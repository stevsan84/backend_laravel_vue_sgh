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
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion_code')->unique();
            $table->string('codigo_unico')->unique();
            $table->string('razon_social');
            $table->string('representante_legal');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('establecimiento_sistema_id');
            $table->foreign('establecimiento_sistema_id')->references('id')->on('establecimiento_sistemas');
            $table->unsignedBigInteger('establecimiento_tipos_id');
            $table->foreign('establecimiento_tipos_id')->references('id')->on('establecimiento_tipos');
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')->references('id')->on('cantons');
            $table->unsignedBigInteger('parroquia_id');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->string('direccion');
            $table->text('logo')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establecimientos');
    }
};
