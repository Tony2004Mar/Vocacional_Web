<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('id_reporte');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_test');
            $table->string('nombre_archivo');
            $table->string('ruta_archivo');
            $table->timestamps();

            $table->foreign('id_alumno')
                ->references('id_alumno')
                ->on('alumnos')
                ->onDelete('cascade');

            $table->foreign('id_test')
                ->references('id_test')
                ->on('tests')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
