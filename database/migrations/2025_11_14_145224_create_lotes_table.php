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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('laboratorio_fabricante_id');
            $table->foreign('laboratorio_fabricante_id')->references('id')->on('laboratorio_fabricantes');
            $table->string('numero');
            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_caducidad');
            $table->date('registro_sanitario')->nullable();
            $table->decimal('costo')->nullable();
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
        Schema::dropIfExists('lotes');
    }
};
