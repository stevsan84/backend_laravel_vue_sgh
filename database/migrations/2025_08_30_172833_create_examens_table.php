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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo', ['orden', 'resultado', 'ambos']);
            //$table->foreignId('categoria_examen_id')->constrained('categorias_examenes')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_examen_id');
            $table->foreign('categoria_examen_id')->references('id')->on('categoria_examens');
            $table->integer('orden');
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
        Schema::dropIfExists('examens');
    }
};
