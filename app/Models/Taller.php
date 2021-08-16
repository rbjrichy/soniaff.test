<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;
    protected $table = 'talleres';
    protected $dates = ['fecha_inicio'];
    protected $fillable = [
        'nombre_taller', 'descripcion', 'profesion_id', 'fecha_inicio'
    ];

    public function getActivoAttribute($value)
    {
        return ($value==1)?'Activo':'Inactivo';
    }

    public function sesiones()
    {
        return $this->hasMany(Sesion::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Persona::class,'alumno_taller', 'taller_id', 'alumno_id');
    }
}
