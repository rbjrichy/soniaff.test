<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TallerController;

/*rutas para psicologo taller*/
Route::resource('taller', TallerController::class)->names('psico.taller');
Route::get('/historial', [TallerController::class,'talleres_historial'])->name('psico.taller.historial');
Route::post('/historial', [TallerController::class,'talleres_historial'])->name('psico.taller.historial.buscar');
Route::get('taller/sesion/{taller}', [TallerController::class, 'sesiones_taller'])->name('psico.taller.sesiones');
Route::get('/taller/control/alumnos/{taller}',[TallerController::class,'controlTallerAlumnos'])->name('psico.taller.control.alumnos.index');
Route::post('/taller/control/alumnos/registrar',[TallerController::class,'inscribirAlumnoTaller'])->name('psico.taller.control.alumnos.resgitrar');

Route::resource('sesion', SesionController::class)->names('psico.sesion')->except('create');
Route::get('taller/crear/sesion/{taller}', [SesionController::class,'create'])->name('psico.sesion.create');
// Route::resource('evaluacion', EvaluacionController::class)->names('psico.evaluacion');
// Route::resource('intervencion', IntervencionController::class)->names('psico.intervencion');inscribirAlumnoTaller