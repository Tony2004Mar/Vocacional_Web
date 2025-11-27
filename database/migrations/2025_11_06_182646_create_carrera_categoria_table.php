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
       Schema::create('carrera_categoria', function (Blueprint $table) {
           $table->id('id_carrera_categoria');
           $table->foreignId('id_carrera')->constrained('carreras', 'id_carrera')->onDelete('cascade');
           $table->foreignId('id_categoria')->constrained('categorias_riasec', 'id_categoria')->onDelete('cascade');
           $table->timestamps();
       });
   }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_categoria');
    }
};
