<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'departamento_id'];

    // Un municipio pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
