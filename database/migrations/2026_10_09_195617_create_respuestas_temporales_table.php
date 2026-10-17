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
        Schema::create('respuestas_temporales', function (Blueprint $table) {
            $table->id('id_respuesta_temporal');
            $table->unsignedBigInteger('id_test');
            $table->unsignedBigInteger('id_pregunta');
            $table->enum('respuesta', ['si', 'no']);
            $table->timestamps();

            // Relación con tests (se borra en cascada si se elimina el test)
            $table->foreign('id_test')
                  ->references('id_test')
                  ->on('tests')
                  ->onDelete('cascade');

            // Relación con preguntas
            $table->foreign('id_pregunta')
                  ->references('id_pregunta')
                  ->on('preguntas')
                  ->onDelete('cascade');

            // Un test no puede tener 2 respuestas a la misma pregunta
            $table->unique(['id_test', 'id_pregunta'], 'unique_test_pregunta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_temporales');
    }
};