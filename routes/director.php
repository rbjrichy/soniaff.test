<?php

use App\Http\Controllers\AvisosCobroController;
use App\Http\Controllers\Director\CuentaAlumnoController;
use App\Http\Controllers\Director\DirectorController;
use App\Http\Controllers\Director\ReportesPagosController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TarifaController;
use Illuminate\Support\Facades\Route;

Route::get('listar/psicologos', [DirectorController::class, 'listaPsicologos'])->name('director.lista.psicologos');
Route::get('pacientes/psicologo/{psicologo}', [DirectorController::class, 'listaPacientes'])->name('director.lista.pacientes.psicologo');
Route::post('pacientes/psicologo/asignar', [DirectorController::class, 'asignarPacientePsicologo'])->name('director.psicologo.asignar.paciente');
Route::post('pacientes/psicologo/quitar', [DirectorController::class, 'quitarPacientePsicologo'])->name('director.psicologo.quitar.paciente');

/**Getionar tarifas */
Route::get('getionar/tarifas/{tarifa?}',[TarifaController::class, 'tarifasIndex'])->name('director.gestionar.tarifa.index');
Route::put('getionar/tarifas/{tarifa?}',[TarifaController::class, 'updateTarifa'])->name('director.gestionar.tarifa.update');

/**Getionar matriculas */
Route::get('gestionar/matriculados', [MatriculaController::class, 'listaMatriculados'])->name('director.matriculas.lista.matriculados');
Route::get('matricular/alumno', [MatriculaController::class, 'matricularAlumnoCreate'])->name('director.matriculas.create');
Route::post('matricular/alumno', [MatriculaController::class, 'matricularAlumnoStore'])->name('director.matriculas.store');
Route::get('matricula/alumno/edit/{matricula}', [MatriculaController::class, 'matricularAlumnoEdit'])->name('director.matriculas.edit');
Route::post('matricula/alumno/edit', [MatriculaController::class, 'matricularAlumnoUpdate'])->name('director.matriculas.update');
Route::get('matricula/alumno/baja/{matricula}', [MatriculaController::class, 'darBajaMatricula'])->name('director.matriculas.baja.show');
Route::post('matricula/alumno/delete', [MatriculaController::class, 'darBajaMatriculaDelete'])->name('director.matriculas.delete');

/** cuentas alumnos */
Route::get('gestionar/cuenta/alumno/{alumno}', [CuentaAlumnoController::class, 'cuentaAlumno'])->name('director.matricula.cuenta.alumno');

/**avisos de cobro */
Route::get('gestionar/avisos/cobro/{matricula}', [AvisosCobroController::class,'crearAvisoCobro'])->name('director.avisos.cobro.create');
Route::post('gestionar/avisos/cobro/{matricula}', [AvisosCobroController::class,'guardarAvisoCobro'])->name('director.avisos.cobro.store');
Route::get('gestionar/avisos/cobro/eliminar/{avisoCobro})',[AvisosCobroController::class, 'eliminarAvisoCobro'])->name('director.avisos.cobro.eliminar.show');
Route::post('gestionar/avisos/cobro/eliminar/{avisoCobro})',[AvisosCobroController::class, 'eliminarAvisoCobroDelete'])->name('director.avisos.cobro.eliminar.delete');

/** Pagos */
Route::post('pagar/cuentas/alumno', [PagoController::class, 'pagarCuentas'])->name('director.pagar.cuentas.alumno');
Route::get('pagos',[PagoController::class, 'pagosIndex'])->name('director.pagos.index');
Route::post('generar/avisos/cobro', [PagoController::class,'generarAvisosCobro'])->name('director.generar.avisos.cobro');
Route::post('registrar/pago/buscar/matricula', [PagoController::class,'buscarAlumnoMatricula'])->name('director.buscar.alumno.matricula');

/**reportes */
Route::get('reporte/deudas',[ReportesPagosController::class, 'verReporteDeuda'])->name('director.ver.reporte.deudas');
Route::post('reporte/deudas',[ReportesPagosController::class, 'generarReporteDeuda'])->name('director.generar.reporte.deudas');
Route::get('reporte/ingresos',[ReportesPagosController::class, 'verReporteIngresos'])->name('director.ver.reporte.ingresos');
Route::post('reporte/ingresos',[ReportesPagosController::class, 'generarReporteIngresos'])->name('director.generar.reporte.ingresos');

