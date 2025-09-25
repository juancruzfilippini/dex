<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ConsultaExpedientesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::redirect('/', '/dex-laravel/public/login'); // <<— en vez de return view('welcome')

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

    // Expedientes: consultas específicas
    Route::post('/expedientes/numero-anio', [ConsultaExpedientesController::class, 'porNumeroAnio'])->name('expedientes.numero');
    Route::post('/expedientes/reparticion', [ConsultaExpedientesController::class, 'porReparticion'])->name('expedientes.reparticion');
    Route::post('/expedientes/documentos', [ConsultaExpedientesController::class, 'conDocumentos'])->name('expedientes.documentos');
    Route::post('/expedientes/bloqueados', [ConsultaExpedientesController::class, 'bloqueados'])->name('expedientes.bloqueados');
    Route::post('/expedientes/solicitante', [ConsultaExpedientesController::class, 'porSolicitante'])->name('expedientes.solicitante');

    // GEDOS
    Route::get('/gedos', function () {
        return view('gedos.index');
    })->name('gedos.index');

// Test Oracle: documentos asociados a un expediente
    Route::get('/test-oracle-documentos', function (Illuminate\Http\Request $request) {
    try {
        $id = $request->input('id'); // ej: ?id=394

        if (!$id) {
            return "⚠️ Debes enviar un ID de expediente, ej: /test-oracle-documentos?id=394";
        }

        $expedientes = DB::connection('oracle')->select("
            SELECT e.NUMERO, e.ANIO, d.ID_DOCUMENTO, d.FECHA_CARGA
            FROM EE_GED.EE_EXPEDIENTE_DOCUMENTOS d
            JOIN EE_GED.EE_EXPEDIENTE_ELECTRONICO e 
                ON d.ID_EE_DOC = e.ID
            WHERE e.ID = :id
              AND ROWNUM <= 10
        ", ['id' => $id]);

        return ['expedientes' => $expedientes];

    } catch (\Exception $e) {
        return $e->getMessage();
    }
});


});

require __DIR__.'/auth.php';
