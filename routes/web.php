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

    // Rutas de visualización para todos los usuarios autenticados
    // Route::get('/masters/{master}', [MasterController::class, 'show'])->name('masters.show');
    // Route::get('/alumnes/{alumne}', [AlumneController::class, 'show'])->name('alumnes.show');

    Route::get('/masters/{master}', [MasterController::class, 'show'])
        ->whereNumber('master')
        ->name('masters.show');

    Route::get('/alumnes/{alumne}', [AlumneController::class, 'show'])
        ->whereNumber('alumne')
        ->name('alumnes.show');


    // NUEVAS RUTAS PARA EXPORTAR PDF (añade estas líneas)
    Route::get('/masters/{master}/export-pdf', [MasterController::class, 'exportPdf'])->name('masters.exportPdf');
    Route::get('/alumnes/{alumne}/export-pdf', [AlumneController::class, 'exportPdf'])->name('alumnes.exportPdf');

    // RUTES PROTEGIDES PER ADMIN (Middleware AdminAuth)
    Route::middleware(['adminAuth'])->group(function () {
        // CRUD Completo (excepto show que ya está definido arriba)
        Route::resource('masters', MasterController::class)->except(['show']);
        Route::resource('alumnes', AlumneController::class)->except(['show']);
        
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

    // RUTES PER CONSULTORS
    Route::get('/dashboard-consultor', function () {
        return view('dashboard-consultor');
    })->name('dashboard-consultor');

    // Vistas listados para consultores (usan el mismo método index que los admin)
    Route::get('/consultor/masters', [MasterController::class, 'index'])->name('masters.consultor');
    Route::get('/consultor/alumnes', [AlumneController::class, 'index'])->name('alumnes.consultor');
});

require __DIR__.'/auth.php';