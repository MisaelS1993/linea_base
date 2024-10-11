<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aldea extends Model
{
    use HasFactory;

    protected $fillable = ['municipio_id', 'descripcion'];

    // Relación de muchos a uno con Municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}