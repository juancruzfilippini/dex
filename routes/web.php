<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dex-laravel/public/login'); // <<— en vez de return view('welcome')

// Opcional: si no usás verificación de email, podés quitar 'verified'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::get('/usuarios/nombre', [UserController::class, 'nombrePorUsuario'])->name('users.nombre');
});

require __DIR__ . '/auth.php';
