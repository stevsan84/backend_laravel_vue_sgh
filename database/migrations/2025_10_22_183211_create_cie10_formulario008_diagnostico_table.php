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
        Schema::create('cie10_formulario008_diagnostico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cie10_id');
            $table->foreign('cie10_id')->references('id')->on('cie10s');
            $table->unsignedBigInteger('formulario008_diagnostico_id');
            $table->foreign('formulario008_diagnostico_id')->references('id')->on('formulario008_diagnosticos');
            $table->text('condicion');
            $table->text('cronologia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cie10_formulario008_diagnostico');
    }
};
