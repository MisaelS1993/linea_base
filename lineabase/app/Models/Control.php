<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora',
        'entrevistador',
        'supervisor',
        'entrevistado',
        'id_departamento',
        'id_municipio',
        'id_aldeas',
        'observacion',
        'telefono',
        'no_manzana',
        'no_lote',
        'ubicacion_vivienda',
        'no_catastral',
    ];

    // Relación con la tabla Municipios
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio'); // id_municipio debe ser el campo que guarda la relación
    }

    // Relación con la tabla Departamentos
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento'); // id_departamento debe ser el campo que guarda la relación
    }

    // Relación con la tabla Aldeas
    public function aldea()
    {
        return $this->belongsTo(Aldea::class, 'id_aldeas'); // id_comunidad debe ser el campo que guarda la relación
    }
}
