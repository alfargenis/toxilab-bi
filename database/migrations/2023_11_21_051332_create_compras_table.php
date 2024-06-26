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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('factura');
            $table->integer('fecha_compra');
            $table->decimal('precio_unitario', 8, 2);
            $table->boolean('status');
            $table->foreignId('id_proveedor')->constrained('proveedores');
            $table->foreignId('id_reactivo')->constrained('reactivos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
