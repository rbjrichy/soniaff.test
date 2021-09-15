<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;
    protected $table = 'taller_sesiones';
    protected $dates = ['fecha_hora'];
    protected $fillable = [
        'numero_sesion','duracion','actividades', 'objetivos', 'materiales', 'procedimientos', 'fecha_hora', 'taller_id'
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }
}
