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
        Schema::create('evento_tipo_formulario008_evento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_tipo_id');
            $table->foreign('evento_tipo_id')->references('id')->on('evento_tipos');
            $table->unsignedBigInteger('formulario008_evento_id');
            $table->foreign('formulario008_evento_id')->references('id')->on('formulario008_eventos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_tipo_formulario008_evento');
    }
};
