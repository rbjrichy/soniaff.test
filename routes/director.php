<?php

use App\Http\Controllers\Director\DirectorController;
use Illuminate\Support\Facades\Route;

Route::get('listar/psicologos', [DirectorController::class, 'listaPsicologos'])->name('director.lista.psicologos');
Route::get('pacientes/psicologo/{psicologo}', [DirectorController::class, 'listaPacientes'])->name('director.lista.pacientes.psicologo');
Route::post('pacientes/psicologo/asignar', [DirectorController::class, 'asignarPacientePsicologo'])->name('director.psicologo.asignar.paciente');
Route::post('pacientes/psicologo/quitar', [DirectorController::class, 'quitarPacientePsicologo'])->name('director.psicologo.quitar.paciente');