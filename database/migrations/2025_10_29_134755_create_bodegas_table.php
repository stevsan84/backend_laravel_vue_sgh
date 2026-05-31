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
        Schema::create('bodegas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('almacenamiento_tipo_id');
            $table->foreign('almacenamiento_tipo_id')->references('id')->on('almacenamiento_tipos');
            $table->unsignedBigInteger('bodega_tipo_id');
            $table->foreign('bodega_tipo_id')->references('id')->on('bodega_tipos');
            $table->unsignedBigInteger('bodega_grupo_id');
            $table->foreign('bodega_grupo_id')->references('id')->on('bodega_grupos');
            $table->boolean('vacuna')->default(false)->nullable();
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('bodegas');
    }
};
