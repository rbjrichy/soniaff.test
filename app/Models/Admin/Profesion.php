<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    use HasFactory;
    protected $table = 'profesiones';
    protected $fillable = [
        'registro_profesional', 'especialidad', 'persona_id'
    ];
}
