<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    // Añadir los campos que pueden ser asignados masivamente
    protected $fillable = ['descripcion'];

    // Un departamento tiene muchos municipios
    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
}