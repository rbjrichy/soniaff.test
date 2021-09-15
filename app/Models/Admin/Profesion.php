<?php

namespace App\Models\Admin;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    use HasFactory;
    protected $table = 'profesiones';
    protected $fillable = [
        'registro_profesional', 'especialidad', 'persona_id'
    ];

    public function psicologo()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id')->where('tipo_persona','Profesional');
    }

    public function pacientes()
    {
        return $this->belongsToMany(Persona::class, 'paciente', 'psicologo_id','alumno_id');
    }

}
