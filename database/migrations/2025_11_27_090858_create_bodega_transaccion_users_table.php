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
        Schema::create('bodega_transaccion_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bodega_id');
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->unsignedBigInteger('transaccion_id');
            $table->foreign('transaccion_id')->references('id')->on('transaccions');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bodega_transaccion_users');
    }
};
