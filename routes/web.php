<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/operarios', [AdminController::class, 'index'])->name('admin.operarios.index');
    Route::post('/admin/operarios', [AdminController::class, 'store'])->name('admin.operarios.store');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/pedidos', function () {
    return Inertia::render('Pedidos');
})->middleware(['auth', 'verified', 'role:admin|user'])->name('pedidos');

Route::get('/clientes', function () {
    return Inertia::render('Clientes');
})->middleware(['auth', 'verified', 'role:admin|user'])->name('clientes');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
