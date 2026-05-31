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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('almacenamiento_tipo_id');
            $table->foreign('almacenamiento_tipo_id')->references('id')->on('almacenamiento_tipos');
            $table->string('codigo_cum_cudim')->nullable();
            $table->string('nombre_ficha');
            $table->string('codigo_sku');
            $table->string('nombre_especifico');
            $table->string('nombre_comercial');
            $table->string('codigo_barra')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidads');
            $table->unsignedBigInteger('farmaceutica_especifica_id')->nullable();
            $table->foreign('farmaceutica_especifica_id')->references('id')->on('farmaceutica_especificas');
            $table->unsignedBigInteger('farmaceutica_general_id')->nullable();
            $table->foreign('farmaceutica_general_id')->references('id')->on('farmaceutica_generals');
            $table->string('presentacion_comercial')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('observacion')->nullable();
            $table->boolean('cadena_frio')->default(false)->nullable();
            $table->boolean('lote')->default(false)->nullable();
            $table->boolean('registro_sanitario')->default(false)->nullable();
            $table->boolean('fecha_caducidad')->default(false)->nullable();
            $table->boolean('alerta_caducidad')->default(false)->nullable();
            $table->integer('dias_caducidad')->nullable();
            $table->boolean('alerta_canje')->default(false)->nullable();
            $table->integer('dias_canje')->nullable();
            $table->boolean('vacuna')->default(false)->nullable();
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
        Schema::dropIfExists('productos');
    }
};
