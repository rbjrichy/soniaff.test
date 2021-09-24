<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisosCobro extends Model
{
    use HasFactory;
    protected $dates = ['fecha'];
    protected $table = 'avisos_cobros';
    protected $fillable = ['matricula_id','tarifa_id','mes','importe','concepto','fecha'];

    public function tarifa()
    {
        return $this->belongsTo(tarifa::class,'tarifa_id');
    }
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'matricula_id');
    }
}
