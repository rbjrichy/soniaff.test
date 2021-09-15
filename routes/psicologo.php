<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Psicologo\InformeTallerController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TallerController;

/*rutas para psicologo taller*/
Route::resource('taller', TallerController::class)->names('psico.taller');
Route::get('/historial', [TallerController::class,'talleres_historial'])->name('psico.taller.historial');
Route::post('/historial', [TallerController::class,'talleres_historial'])->name('psico.taller.historial.buscar');
Route::get('taller/sesion/{taller}', [TallerController::class, 'sesiones_taller'])->name('psico.taller.sesiones');
Route::get('/taller/control/personas/{taller}',[TallerController::class,'controlTallerAlumnos'])->name('psico.taller.control.alumnos.index');
Route::post('/taller/control/personas/registrar',[TallerController::class,'inscribirAlumnoTaller'])->name('psico.taller.control.alumnos.resgitrar');
Route::post('/taller/control/personas/desregistrar',[TallerController::class,'quitarAlumnoTaller'])->name('psico.taller.control.alumnos.desregistrar');

Route::resource('sesion', SesionController::class)->names('psico.sesion')->except('create', 'store');
Route::post('taller/crear/sesion/{taller}', [SesionController::class,'store'])->name('psico.sesion.store');
Route::get('taller/crear/sesion/{taller}', [SesionController::class,'create'])->name('psico.sesion.create');
// Route::resource('evaluacion', EvaluacionController::class)->names('psico.evaluacion');
// Route::resource('intervencion', IntervencionController::class)->names('psico.intervencion');inscribirAlumnoTaller

/* realizar imformes */
Route::get('crear/informe/taller/{taller}', [TallerController::class, 'informeTallerCreate'])->name('psico.taller.crear.informe');
Route::post('crear/informe/taller/{taller}', [InformeTallerController::class, 'guardarInformeTaller'])->name('psico.taller.store.informe');
Route::get('editar/informe/taller/{informe}', [InformeTallerController::class, 'informeTallerEdit'])->name('psico.taller.edit.informe');
Route::post('editar/informe/taller/{informe}', [InformeTallerController::class, 'informeTallerUpdate'])->name('psico.taller.update.informe');
Route::get('ver/informe/taller/{informe}', [InformeTallerController::class, 'informeTallerVer'])->name('psico.taller.informe.ver');
Route::get('imprimir/informe/taller/{informe}', [InformeTallerController::class, 'informeTallerImprimir'])->name('psico.taller.informe.imprimir');

/** reportes */
Route::get('pisicologo/reportes', [ReportesController::class, 'psicoReportesIndex'])->name('psico.reportes.index');
Route::get('pisicologo/reportes/talleres', [ReportesController::class, 'psicoReportesTalleres'])->name('psico.reportes.talleres');

