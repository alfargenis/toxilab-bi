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
        Schema::create('antibiograma', function (Blueprint $table) {
            $table->integer('idBac')->nullable(false);
            $table->integer('idMOrg')->nullable(false);
            $table->integer('idAnt')->nullable(false);
            $table->char('Metodo', 1)->nullable(false);
            $table->string('Result', 15)->nullable(false);
            $table->char('Sens', 1)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antibiograma');
    }
};
