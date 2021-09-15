<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeTaller extends Model
{
    use HasFactory;
    protected $table = 'informes_talleres';
    protected $fillable = [
        'justificacion', 'objetivo_general', 'objetivos_especificos', 'contenido', 
        'procedimiento', 'resultados', 'conclusiones', 'recomendaciones',
        'taller_id'
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }
}
