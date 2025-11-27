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
        Schema::create('tests', function (Blueprint $table) {
            $table->id('id_test');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno')
                ->onDelete('cascade');

            $table->foreignId('id_estado')
                ->nullable()
                ->constrained('estados', 'id_estado')
                ->nullOnDelete();

            $table->foreignId('id_pregunta_actual')
                ->nullable()
                ->constrained('preguntas', 'id_pregunta')
                ->nullOnDelete();

            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_finalizacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
