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
        Schema::create('asignar', function (Blueprint $table) {
            $table->primary('ID');
            $table->integer('idInterfase')->nullable(false);
            $table->integer('idExamen')->nullable(false);
            $table->integer('idExAnalizador')->nullable(false);
            $table->char('Activa', 1)->nullable(false);
            $table->integer('idMetodo')->nullable(false);
            $table->foreign('idExamen')->references('ID')->on('examenes')->onDelete('cascade');
            $table->foreign('idInterfase')->references('ID')->on('interfases')->onDelete('cascade');
            $table->foreign('idMetodo')->references('ID')->on('metodologia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignar');
    }
};
