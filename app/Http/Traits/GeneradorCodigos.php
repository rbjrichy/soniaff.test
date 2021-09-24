<?php
namespace App\Http\Traits;

use App\Models\Codigo;
use Illuminate\Support\Facades\Config;

Trait GeneradorCodigos
{
    public function generarCodigo(string $tipo)
    {
        $ultimoRegisto = $this->getUltimoCodigo($tipo);
        if(is_null($ultimoRegisto))
        {
            $codigo_generado = Codigo::create([
                'tipo' => $tipo,
                'contador' => Config::get('constants.contadorInicial'),
                'codigo' => $tipo.'-'.Config::get('constants.contadorInicial')
            ]);
        }else{
            $contador = $ultimoRegisto->contador + 1;
            $codigo_generado = Codigo::create([
                'tipo' => $tipo,
                'contador' => $contador,
                'codigo' => $tipo.'-'.$contador
            ]);
        }
        return $codigo_generado;
    }
    public function getUltimoCodigo(string $tipo)
    {
        return Codigo::where('tipo', $tipo)->orderBy('id','desc')->first();
    }
}
