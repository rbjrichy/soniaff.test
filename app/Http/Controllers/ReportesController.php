<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function psicoReportesIndex()
    {
        $num_talleres = Taller::where('activo', 1)->where('profesion_id', Auth::user()->id)->count();
        return view('psico.reportes.index')->with(compact('num_talleres'));
    }
    public function psicoReportesTalleres()
    {
        $talleres =  Taller::where('activo', 1)->where('profesion_id', Auth::user()->id)->get();
        return view('psico.reportes.talleres')->with(compact('talleres'));
    }
}
