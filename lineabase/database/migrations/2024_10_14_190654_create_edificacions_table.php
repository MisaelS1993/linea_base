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
        Schema::create('edificacions', function (Blueprint $table) {
            $table->id(); // Campo de ID autoincremental
            $table->unsignedBigInteger('id_controls'); // Clave foránea a la tabla 'controls'
            $table->integer('total_edificaciones')->nullable(); // Puede quedar vacío
            $table->integer('total_unidades')->nullable(); // Puede quedar vacío
            $table->string('no_edificacion')->nullable(); // Puede quedar vacío

            // Definir materiales con valores opcionales
            $table->string('material_paredes')->nullable();
            $table->string('material_techo')->nullable();
            $table->string('material_piso')->nullable();

            // Definir los problemas y condiciones de la edificación con valores opcionales
            $table->text('problema_edificacion')->nullable();
            $table->string('condicion_edificacion')->nullable();

            // Definir la relación de clave foránea
            $table->foreign('id_controls')->references('id')->on('controls')->onDelete('cascade');

            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edificacions');
    }
};
