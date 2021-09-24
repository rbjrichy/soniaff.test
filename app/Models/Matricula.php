<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table = 'matriculas';
    protected $dates = ['fecha_matriculacion', 'fecha_baja'];
    protected $fillable = [
        'fecha_matriculacion', 'codigo', 'poblacion','gestion','tarifa_defecto_id', 'alumno_id'
    ];

    public function alumno()
    {
        return $this->belongsTo(Persona::class, 'alumno_id');
    }

    public function getEstadoAttribute($valor)
    {
        return ($valor==1)?'Activo':'Inactivo';
    }

    public function tarifaDefecto()
    {
        return $this->belongsTo(Tarifa::class, 'tarifa_defecto_id');
    }

    public function avisosCobro()
    {
        return $this->hasMany(AvisosCobro::class, 'matricula_id');
    }
    
}
