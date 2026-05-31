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
        Schema::create('cita_subtipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('cita_tipo_id');
            $table->foreign('cita_tipo_id')->references('id')->on('cita_tipos');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita_subtipos');
    }
};
