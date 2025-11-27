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
       Schema::create('resultados', function (Blueprint $table) {
           $table->id('id_resultado');
           $table->foreignId('id_test')->constrained('tests', 'id_test')->onDelete('cascade');
           $table->integer('puntos_R')->default(0);
           $table->integer('puntos_I')->default(0);
           $table->integer('puntos_A')->default(0);
           $table->integer('puntos_S')->default(0);
           $table->integer('puntos_E')->default(0);
           $table->integer('puntos_C')->default(0);
           $table->timestamps();
       });
   }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
