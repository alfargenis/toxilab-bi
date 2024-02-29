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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('t_equipo');
            $table->string('modelo');
            $table->string('marca');
            $table->string('serial');
            $table->date('adquisicion');
            $table->decimal('precio_adquisicion', 8, 2);
            $table->integer('vida_util');
            $table->string('ubicacion');
            $table->string('responsable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};