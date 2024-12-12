<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;

// rutas para el admin
Route::middleware(['role:admin'])->group(function () {
    // admin panel
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Operarios
    Route::get('/admin/operarios', [AdminController::class, 'indexOperarios'])->name('admin.operarios.index');
    Route::get('/admin/operarios/create', [AdminController::class, 'createOperario'])->name('admin.operarios.create');
    Route::get('/admin/operarios/{id}/edit', [AdminController::class, 'editOperario'])->name('admin.operarios.edit');
    Route::post('/admin/operarios', [AdminController::class, 'storeOperario'])->name('admin.operarios.store');
    Route::put('/admin/operarios/{id}', [AdminController::class, 'updateOperario'])->name('admin.operarios.update');
    Route::delete('/admin/operarios/{id}', [AdminController::class, 'destroyOperario'])->name('admin.operarios.destroy');
    Route::get('/admin/operarios/{id}', [AdminController::class, 'showOperario'])->name('admin.operarios.show');

    // Clientes
    Route::get('/admin/clientes', [AdminController::class, 'indexClientes'])->name('admin.clientes.index');
    Route::get('/admin/clientes/create', [AdminController::class, 'createCliente'])->name('admin.clientes.create');
    Route::get('/admin/clientes/{id}/edit', [AdminController::class, 'editCliente'])->name('admin.clientes.edit');
    Route::post('/admin/clientes', [AdminController::class, 'storeCliente'])->name('admin.clientes.store');
    Route::put('/admin/clientes/{id}', [AdminController::class, 'updateCliente'])->name('admin.clientes.update');
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
