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
        Schema::create('manchester_triages', function (Blueprint $table) {
             $table->id();
            $table->integer('nivel');
            $table->string('nombre');
            $table->string('color');
            $table->string('categoria');
            $table->integer('tiempo_espera');
            $table->string('comentario')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manchester_triages');
    }
};
