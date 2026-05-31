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
        Schema::create('antecedente_formulario008_antecedente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('antecedente_id');
            $table->foreign('antecedente_id')->references('id')->on('antecedentes');
            $table->unsignedBigInteger('formulario008_antecedente_id');
            $table->foreign('formulario008_antecedente_id')->references('id')->on('formulario008_antecedentes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedente_formulario008_antecedente');
    }
};
