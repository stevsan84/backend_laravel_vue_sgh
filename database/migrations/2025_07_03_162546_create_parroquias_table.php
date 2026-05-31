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
        Schema::create('parroquias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')->references('id')->on('cantons');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parroquias');
    }
};
