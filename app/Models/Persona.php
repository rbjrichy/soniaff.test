<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personas';
    protected $dates = ['fecha_nac'];
    protected $fillable = ['tipo_persona','ci_nit','nombres','apellidos','fecha_nac','lugar_nac','escolaridad','direccion','idioma','genero','ocupacion','telefonos'];


    public function tutores()
    {
        return $this->belongsToMany(Persona::class, 'persona_tutor', 'persona_id', 'tutor_id')->withPivot('tipo_relacion');
    }

    public function tutelados()
    {
        return $this->belongsToMany(Persona::class, 'persona_tutor', 'tutor_id', 'persona_id');
    }

}
