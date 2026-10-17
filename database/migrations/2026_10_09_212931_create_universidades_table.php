<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('universidades', function (Blueprint $table) {
            $table->id('id_universidad');
            $table->string('nombre', 255);
            $table->string('siglas', 50)->nullable();
            $table->enum('tipo', ['publica', 'privada'])->default('publica');
            $table->string('estado', 100)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('direccion', 500)->nullable();
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            $table->string('ubicacion_url', 500)->nullable();
            $table->string('sitio_web', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universidades');
    }
};