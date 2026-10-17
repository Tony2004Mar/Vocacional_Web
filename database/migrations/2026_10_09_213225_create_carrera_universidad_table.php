<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carrera_universidad', function (Blueprint $table) {
            $table->id('id_carrera_universidad');

            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_universidad');

            $table->string('duracion', 100)->nullable();
            $table->enum('modalidad', ['presencial', 'en_linea', 'mixta'])->default('presencial');
            $table->boolean('activo')->default(true);

            $table->timestamps();

            // Relaciones
            $table->foreign('id_carrera')
                  ->references('id_carrera')
                  ->on('carreras')
                  ->onDelete('cascade');

            $table->foreign('id_universidad')
                  ->references('id_universidad')
                  ->on('universidades')
                  ->onDelete('cascade');

            // Evitar duplicados
            $table->unique(['id_carrera', 'id_universidad'], 'unique_carrera_universidad');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrera_universidad');
    }
};