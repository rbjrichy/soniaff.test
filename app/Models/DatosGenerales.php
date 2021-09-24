<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
    use HasFactory;
    protected $table = 'datos_generales';
    protected $fillable = [
        'tipo', 'valor'
    ];
}
