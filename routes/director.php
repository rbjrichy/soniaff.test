<?php

use App\Http\Controllers\Director\DirectorController;
use Illuminate\Support\Facades\Route;

Route::get('listar/psicologos', [DirectorController::class, 'listaPsicologos'])->name('director.lista.psicologos');
Route::get('pacientes/psicologo/{psicologo}', [DirectorController::class, 'listaPacientes'])->name('director.lista.pacientes.psicologo');
