<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('collection_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->text('informe');
            $table->unsignedBigInteger('user_id'); // Asume que estás usando un tipo bigint para los IDs de usuario
            $table->foreign('user_id')->references('id')->on('users'); // Asegúrate de que 'users' sea el nombre de tu tabla de usuarios
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_data');
    }
};
