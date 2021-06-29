<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\TutorController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);

Route::resource('persona', PersonaController::class)->names('admin.persona');
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
Route::resource('alumnos', AlumnoController::class)->names('admin.alumnos');
Route::resource('tutores', TutorController::class)->names('admin.tutor');