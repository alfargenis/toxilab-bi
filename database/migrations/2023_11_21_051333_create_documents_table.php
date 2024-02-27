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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_archivo');
            $table->string('tipo_archivo');
            $table->unsignedBigInteger('tamano_archivo');
            $table->string('ruta_archivo');
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // Asume que estás usando un tipo bigint para los IDs de usuario
            $table->foreign('user_id')->references('id')->on('users'); // Asegúrate de que 'users' sea el nombre de tu tabla de usuarios
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
