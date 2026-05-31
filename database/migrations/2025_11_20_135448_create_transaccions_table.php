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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_transaccion_id');
            $table->foreign('tipo_transaccion_id')->references('id')->on('tipo_transaccions');
            $table->string('codigo');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('gestion_vacuna',['No','Registro de Dosis','Transacciones de Inventario']);
            /*$table->boolean('gestion_vacuna')->default(false)->nullable();
            $table->boolean('registro_dosis')->default(false)->nullable();
            $table->boolean('transaccion_inventario')->default(false)->nullable();*/
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
        Schema::dropIfExists('transaccions');
    }
};
