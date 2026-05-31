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
        Schema::create('presentacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('empaque_presentacion_id');
            $table->foreign('empaque_presentacion_id')->references('id')->on('empaque_presentacions');
            $table->unsignedBigInteger('presentacion_unidad_id');
            $table->foreign('presentacion_unidad_id')->references('id')->on('presentacion_unidads');
            $table->integer('cantidad');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentacions');
    }
};
