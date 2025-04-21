<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rutes públiques
Route::get('/', function () {
    return view('inici');
})->name('inici');

Route::get('/info', function () {
    return view('info');
})->name('info');

// Grup d'autenticació
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard redirigido por rol
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'admin' 
            ? view('dashboard-admin') 
            : view('dashboard-consultor');
    })->name('dashboard');

    // Rutes de perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =============================================
    // RUTES PROTEGIDES PER ADMIN (Middleware AdminAuth)
    // =============================================
    Route::middleware(['adminAuth'])->group(function () {
        // CRUD Completo
        Route::resource('masters', MasterController::class);
        Route::resource('alumnes', AlumneController::class);
        
        // GESTIÓ D'USUARIS (Nou)
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // Dashboard admin
        Route::get('/dashboard-admin', function () {
            return view('dashboard-admin');
        })->name('dashboard-admin');
    });

    // =============================================
    // RUTES PER CONSULTORS
    // =============================================
    Route::get('/dashboard-consultor', function () {
        return view('dashboard-consultor');
    })->name('dashboard-consultor');

    // Vista específica de masters per a consultors
    Route::get('/consultor/masters', [MasterController::class, 'index'])->name('masters.consultor');
});

require __DIR__.'/auth.php';