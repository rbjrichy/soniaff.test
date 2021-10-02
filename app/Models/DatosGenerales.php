<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatosGenerales extends Model
{
    use HasFactory;
    protected $table = 'datos_generales';
    protected $fillable = [
        'tipo', 'valor'
    ];

    public function scopeMeses($query)
    {
        DB::statement(DB::raw('SET @rownum = 0'));
        return $query->where('tipo','meses')
                     ->where('valor', '<>', 'Ninguno')
                     ->select(DB::raw('(@rownum:=@rownum+1) AS posicion'), 'valor')
                     ->groupBy('valor')
                     ->orderBy('posicion');
    }
}
