<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);

Route::resource('persona', PersonaController::class)->names('admin.persona');
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
Route::resource('alumnos', UserController::class)->only(['index','edit','update'])->names('admin.alumnos');