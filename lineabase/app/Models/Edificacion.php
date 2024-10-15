<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificacion extends Model
{
    use HasFactory;

    protected $table = 'edificacions';

    protected $fillable = [
        'id_controls',
        'total_edificaciones',
        'total_unidades',
        'no_edificacion',
        'material_paredes',
        'material_techo',
        'material_piso',
        'problema_edificacion',
        'condicion_edificacion',
    ];

    // Relación con Control
    public function control()
    {
        return $this->belongsTo(Control::class, 'id_controls');
    }
}
