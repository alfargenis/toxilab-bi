<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Auditoria', function (Blueprint $table) {
            $table->id('ID');
            $table->char('Area', 3);
            $table->char('TipEve', 3);
            $table->string('Numero', 20);
            $table->string('Numero2', 20);
            $table->char('Imec', 1);
            $table->dateTime('Fecha');
            $table->string('Descrip', 50);
            $table->string('Estacion', 20);
            $table->integer('idUsuario');
            $table->char('StatusExa', 1);

            // Definición de la clave primaria
            $table->primary('ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria');
    }
};
