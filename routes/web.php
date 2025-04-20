<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AlumneController;
use Illuminate\Support\Facades\Route;

// Rutes públiques (idéntico a tus apuntes)
Route::get('/', function () {
    return view('inici');
})->name('inici');

Route::get('/info', function () {
    return view('info');
})->name('info');

// Grup d'autenticació (como en tus apuntes)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard único con redirección por rol (como en tu código)
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'admin' 
            ? view('dashboard-admin') 
            : view('dashboard-consultor');
    })->name('dashboard');

    // Rutes de perfil (Breeze estándar)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =============================================
    // RUTES PROTEGIDES PER ADMIN (Middleware AdminAuth)
    // =============================================
    Route::middleware(['adminAuth'])->group(function () {
        // CRUD de masters i alumnes (como en tus apuntes)
        Route::resource('masters', MasterController::class);
        Route::resource('alumnes', AlumneController::class);

        // Dashboard admin (opcional, pero recomendado)
        Route::get('/dashboard-admin', function () {
            return view('dashboard-admin');
        })->name('dashboard-admin');
    });

    // =============================================
    // RUTES PER CONSULTORS (sin middleware, solo verificación de rol)
    // =============================================
    Route::get('/dashboard-consultor', function () {
        return view('dashboard-consultor');
    })->name('dashboard-consultor');

    // Ruta específica para consultores (como en tu código)
    Route::get('/consultor/masters', [MasterController::class, 'index'])->name('masters.consultor');
});

require __DIR__.'/auth.php';