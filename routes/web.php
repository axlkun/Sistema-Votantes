<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->group(function () {

        // Ruta pública para usuarios autenticados y verificados
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Rutas protegidas por middleware 'admin'
        Route::middleware(['admin'])->group(function () {
            Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
            Route::get('usuarios/crear', [UsuarioController::class, 'create'])->name('usuarios.create');
            Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
            Route::get('usuarios/{usuario}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
            Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
            Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
        });

    });
