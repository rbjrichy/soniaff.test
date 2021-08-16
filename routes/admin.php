<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\TutorController;
use App\Http\Controllers\Admin\ProfesionalController;

use Illuminate\Support\Facades\Route;

/** ruta pagina de inicio autentificado */
Route::get('/', [HomeController::class, 'index'])->name('inicio');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
// Route::resource('persona', PersonaController::class)->names('admin.persona');
// Route::get('alumnos/tutores/store/{alumno}/{tutor}', [AlumnoController::class, 'storeAsignarTutor'])->name('admin.alumnos.tutores.store');
Route::resource('alumnos', AlumnoController::class)->names('admin.alumnos');
Route::get('alumnos/{alumno}/tutores/create', [AlumnoController::class, 'verAsignarTutor'])->name('admin.alumnos.tutores.create');
Route::post('alumnos/tutores/store/{alumno}', [AlumnoController::class, 'storeAsignarTutor'])->name('admin.alumnos.asignartutor.store');
Route::post('alumnos/delete/tutores', [AlumnoController::class, 'quitarTutor'])->name('admin.alumnos.asignartutor.delete');

Route::resource('tutores', TutorController::class)->names('admin.tutores');
Route::resource('profesionales', ProfesionalController::class)->names('admin.prof');
