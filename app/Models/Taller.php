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
        'tema', 'fecha_inicio', 'poblacion','tecnicas_instrumentos','resultado', 'activo', 'profesion_id'
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
        return $this->belongsToMany(Persona::class,'persona_taller', 'taller_id', 'persona_id');
    }

    public function alumnoRegistradoTaller($alumnoId)
    {
        return is_null(
            $this->alumnos()
                 ->where('persona_id', $alumnoId)
                 ->first()
        );    
    }

    public function cantidadSesiones()
    {
        return $this->sesiones()->count();
    }

    public function cantidadParticipantes()
    {
        return $this->alumnos()->count();
    }

    public function fechaConclusion()
    {
        return $this->sesiones()->orderBy('taller_sesiones.fecha_hora','desc')->first()->fecha_hora;
    }

    public function informeTaller()
    {
        return $this->hasOne(InformeTaller::class, 'taller_id');
    }
}
