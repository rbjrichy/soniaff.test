<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;
    protected $table = 'taller_sesiones';
    protected $dates = ['fecha'];
    protected $fillable = [
        'actividades', 'objetivos', 'materiales', 'fecha', 'taller_id'
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }
}
