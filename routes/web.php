<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ConsultaExpedientesController;
use App\Http\Controllers\GedoController;
use App\Http\Controllers\ConsultaGedoController;

Route::redirect('/', '/dex-laravel/public/login');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Usuarios
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::get('/usuarios/nombre', [UserController::class, 'nombrePorUsuario'])->name('users.nombre');

    // Expedientes
    Route::get('/expedientes', [ExpedienteController::class, 'index'])->name('expedientes.index');
    Route::post('/expedientes/numero-anio', [ConsultaExpedientesController::class, 'porNumeroAnio'])->name('expedientes.numero');
    Route::post('/expedientes/reparticion', [ConsultaExpedientesController::class, 'porReparticion'])->name('expedientes.reparticion');
    Route::post('/expedientes/documentos', [ConsultaExpedientesController::class, 'conDocumentos'])->name('expedientes.documentos');
    Route::post('/expedientes/bloqueados', [ConsultaExpedientesController::class, 'bloqueados'])->name('expedientes.bloqueados');
    Route::post('/expedientes/solicitante', [ConsultaExpedientesController::class, 'porSolicitante'])->name('expedientes.solicitante');
    // Expedientes - Ver detalle
    Route::get('/expedientes/detalle/{id}/{anio}', [ConsultaExpedientesController::class, 'detalle'])
    ->name('expedientes.detalle');


    // GEDOS
    Route::get('/gedos', [GedoController::class, 'index'])->name('gedos.index'); // <- ESTA es la que faltaba antes
    Route::post('/gedos/numero-anio', [ConsultaGedoController::class, 'porNumeroAnio'])->name('gedos.numero');
    Route::post('/gedos/reparticion', [ConsultaGedoController::class, 'porReparticion'])->name('gedos.reparticion');
    Route::post('/gedos/bloqueados', [ConsultaGedoController::class, 'bloqueados'])->name('gedos.bloqueados');
    Route::post('/gedos/estado', [ConsultaGedoController::class, 'porEstado'])->name('gedos.estado');
});

require __DIR__.'/auth.php';
