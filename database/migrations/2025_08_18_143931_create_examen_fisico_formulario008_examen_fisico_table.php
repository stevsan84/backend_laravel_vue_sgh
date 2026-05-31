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
        Schema::create('examen_fisico_formulario008_examen_fisico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examen_fisico_id');
            $table->foreign('examen_fisico_id')->references('id')->on('examen_fisicos');
            $table->unsignedBigInteger('formulario008_examen_fisico_id');
            $table->foreign('formulario008_examen_fisico_id')->references('id')->on('formulario008_examen_fisicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_fisico_formulario008_examen_fisico');
    }
};
