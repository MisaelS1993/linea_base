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
        Schema::create('controls', function (Blueprint $table) {
            $table->id(); // Esto crea la columna "id" como clave primaria
            $table->timestamp('fecha_hora'); // Campo para Fecha_hora
            $table->string('entrevistador'); // Campo para Entrevistador
            $table->string('supervisor'); // Campo para Supervisor
            $table->foreignId('id_departamento')->constrained('departamentos'); // Campo para Id_Departamento
            $table->foreignId('id_municipio')->constrained('municipios'); // Campo para Id_Municipio
            $table->foreignId('id_aldeas')->constrained('aldeas'); // Campo para Id_Comunidad
            $table->text('observacion')->nullable(); // Campo para Observación
            $table->string('telefono'); // Campo para Teléfono
            $table->string('no_manzana'); // Campo para No_Manzana
            $table->string('no_lote'); // Campo para No_Lote
            $table->string('ubicacion_vivienda'); // Campo para Ubicación_vivienda
            $table->string('no_catastral'); // Campo para No_Catastral
            $table->timestamps(); // Esto crea las columnas "created_at" y "updated_at"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
