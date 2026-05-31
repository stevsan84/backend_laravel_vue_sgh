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
        Schema::create('examen_complementario_formulario008_examen_complementario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examen_complementario_id');
            $table->foreign('examen_complementario_id')->references('id')->on('examen_complementarios');
            $table->unsignedBigInteger('formulario008_examen_complementario_id');
            $table->foreign('formulario008_examen_complementario_id')->references('id')->on('formulario008_examen_complementarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_complementario_formulario008_examen_complementario');
    }
};
