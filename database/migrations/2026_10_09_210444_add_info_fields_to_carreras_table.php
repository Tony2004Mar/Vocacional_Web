<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->string('duracion', 100)->nullable()->after('descripcion');
            $table->text('campo_laboral')->nullable()->after('duracion');
            $table->string('ubicacion_url', 500)->nullable()->after('campo_laboral');
        });
    }

    public function down(): void
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropColumn(['duracion', 'campo_laboral', 'ubicacion_url']);
        });
    }
};